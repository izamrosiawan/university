// ==WindhawkMod==
// @id              macos-rounded-corners
// @name            macOS Rounded Corners
// @description     Makes window corners rounded like macOS
// @version         1.0.0
// @author          Bo0ii
// @github          https://github.com/Bo0ii
// @homepage        https://github.com/Bo0ii/windhawk-mods
// @include         *
// @exclude         devenv.exe
// @compilerOptions -ldwmapi -luser32
// ==/WindhawkMod==

// ==WindhawkModReadme==
/*
# macOS Rounded Corners

Makes window corners rounded and smooth like macOS.

## Features

- **Smooth Rounded Corners**: All windows get macOS-style rounded corners
- **Native Win11 API**: Uses DWM for optimal performance
- **Universal**: Works with all applications
- **Lightweight**: Minimal performance impact

## Compatibility

- Windows 11 (recommended)
- Windows 10 (requires manual corner preference support)

## Support

Report issues at: https://github.com/Bo0ii/windhawk-mods/issues

## License

MIT License - Feel free to modify and distribute
*/
// ==/WindhawkModReadme==

// ==WindhawkModSettings==
/*
- ExcludeList: ""
  $name: Exclude processes
  $description: >-
    Comma-separated list of process names to exclude (e.g., msedge.exe,chrome.exe).
*/
// ==/WindhawkModSettings==

#include <dwmapi.h>
#include <windhawk_api.h>

#include <algorithm>
#include <string>
#include <vector>

bool g_isExcludedProcess = false;

// Windows 11 DWM corner preference
#ifndef DWMWA_WINDOW_CORNER_PREFERENCE
#define DWMWA_WINDOW_CORNER_PREFERENCE 33
#endif

void ParseExcludeList(LPCWSTR rawList, std::vector<std::wstring>& out) {
    out.clear();
    if (!rawList || !*rawList) return;

    std::wstring list(rawList);
    size_t start = 0;
    while (start < list.size()) {
        size_t end = list.find(L',', start);
        if (end == std::wstring::npos) end = list.size();

        std::wstring item = list.substr(start, end - start);
        size_t first = item.find_first_not_of(L" \t");
        size_t last = item.find_last_not_of(L" \t");
        if (first != std::wstring::npos) {
            item = item.substr(first, last - first + 1);
            std::transform(item.begin(), item.end(), item.begin(), ::towlower);
            out.push_back(item);
        }

        start = end + 1;
    }
}

bool CheckExcludedProcess(const std::vector<std::wstring>& excludeList) {
    if (excludeList.empty()) return false;

    WCHAR exePath[MAX_PATH];
    if (!GetModuleFileNameW(NULL, exePath, MAX_PATH)) return false;

    WCHAR* fileName = wcsrchr(exePath, L'\\');
    if (!fileName) fileName = exePath; else fileName++;

    std::wstring name(fileName);
    std::transform(name.begin(), name.end(), name.begin(), ::towlower);

    for (const auto& excluded : excludeList) {
        if (name == excluded) return true;
    }
    return false;
}

BOOL IsValidWindow(HWND hWnd) {
    if (g_isExcludedProcess) return FALSE;
    if (!IsWindow(hWnd)) return FALSE;

    DWORD dwStyle = GetWindowLongPtr(hWnd, GWL_STYLE);
    if ((dwStyle & WS_POPUP) == WS_POPUP && (dwStyle & WS_CAPTION) == 0)
        return FALSE;

    return (dwStyle & WS_CAPTION) == WS_CAPTION || (dwStyle & WS_THICKFRAME) == WS_THICKFRAME;
}

void ApplyRoundedCorners(HWND hWnd) {
    if (!IsValidWindow(hWnd))
        return;

    // Use DWM corner preference for Win11
    int cornerPref = 2;  // DWMWCP_ROUND
    
    HRESULT hr = DwmSetWindowAttribute(
        hWnd,
        DWMWA_WINDOW_CORNER_PREFERENCE,
        &cornerPref,
        sizeof(cornerPref)
    );

    if (SUCCEEDED(hr)) {
        Wh_Log(L"Applied rounded corners to window");
    } else {
        Wh_Log(L"Failed to apply rounded corners: 0x%X", hr);
    }
}

using DwmSetWindowAttribute_t = decltype(&DwmSetWindowAttribute);
DwmSetWindowAttribute_t DwmSetWindowAttribute_orig;
HRESULT WINAPI DwmSetWindowAttribute_hook(HWND hwnd, DWORD dwAttribute, LPCVOID pvAttribute, DWORD cbAttribute) {
    // Let all DWM calls pass through
    return DwmSetWindowAttribute_orig(hwnd, dwAttribute, pvAttribute, cbAttribute);
}

using CreateWindowExA_t = decltype(&CreateWindowExA);
CreateWindowExA_t CreateWindowExA_orig;
HWND WINAPI CreateWindowExA_hook(
    DWORD dwExStyle, LPCSTR lpClassName, LPCSTR lpWindowName, DWORD dwStyle,
    int x, int y, int nWidth, int nHeight, HWND hWndParent, HMENU hMenu,
    HINSTANCE hInstance, LPVOID lpParam
) {
    HWND hWnd = CreateWindowExA_orig(dwExStyle, lpClassName, lpWindowName, dwStyle, x, y, nWidth, nHeight, hWndParent, hMenu, hInstance, lpParam);
    
    if (hWnd && IsValidWindow(hWnd)) {
        ApplyRoundedCorners(hWnd);
    }
    
    return hWnd;
}

using CreateWindowExW_t = decltype(&CreateWindowExW);
CreateWindowExW_t CreateWindowExW_orig;
HWND WINAPI CreateWindowExW_hook(
    DWORD dwExStyle, LPCWSTR lpClassName, LPCWSTR lpWindowName, DWORD dwStyle,
    int x, int y, int nWidth, int nHeight, HWND hWndParent, HMENU hMenu,
    HINSTANCE hInstance, LPVOID lpParam
) {
    HWND hWnd = CreateWindowExW_orig(dwExStyle, lpClassName, lpWindowName, dwStyle, x, y, nWidth, nHeight, hWndParent, hMenu, hInstance, lpParam);
    
    if (hWnd && IsValidWindow(hWnd)) {
        ApplyRoundedCorners(hWnd);
    }
    
    return hWnd;
}

BOOL CALLBACK EnumWindowsCallback(HWND hWnd, LPARAM lParam) {
    if (IsValidWindow(hWnd)) {
        ApplyRoundedCorners(hWnd);
    }
    return TRUE;
}

BOOL Wh_ModInit() {
    Wh_Log(L"Init - macOS Rounded Corners (Win11)");

    std::vector<std::wstring> excludeList;
    LPCWSTR excludeStr = Wh_GetStringSetting(L"ExcludeList");
    ParseExcludeList(excludeStr, excludeList);
    Wh_FreeStringSetting(excludeStr);
    g_isExcludedProcess = CheckExcludedProcess(excludeList);

    if (g_isExcludedProcess) {
        Wh_Log(L"Process excluded from rounded corners");
        return FALSE;
    }

    // Hook window creation
    Wh_SetFunctionHook(
        (void *)CreateWindowExW,
        (void *)CreateWindowExW_hook,
        (void **)&CreateWindowExW_orig
    );

    Wh_SetFunctionHook(
        (void *)CreateWindowExA,
        (void *)CreateWindowExA_hook,
        (void **)&CreateWindowExA_orig
    );

    Wh_Log(L"Rounded Corners mod initialized");
    return TRUE;
}

void Wh_ModAfterInit() {
    Wh_Log(L"AfterInit - Applying rounded corners to existing windows");
    EnumWindows(EnumWindowsCallback, 0);
}

void Wh_ModSettingsChanged() {
    Wh_Log(L"SettingsChanged - Reapplying rounded corners");
    EnumWindows(EnumWindowsCallback, 0);
}

