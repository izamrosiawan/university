// ==WindhawkMod==
// @id              restore-normal-corners
// @name            Restore Normal Corners
// @description     Restores normal sharp corners (removes rounded corners)
// @version         1.0.0
// @author          Bo0ii
// @github          https://github.com/Bo0ii
// @homepage        https://github.com/Bo0ii/windhawk-mods
// @include         *
// @compilerOptions -ldwmapi -luser32
// ==/WindhawkMod==

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

void RestoreNormalCorners(HWND hWnd) {
    if (!IsValidWindow(hWnd))
        return;

    // Set to default (sharp corners)
    int cornerPref = 0;  // DWMWCP_DEFAULT
    
    HRESULT hr = DwmSetWindowAttribute(
        hWnd,
        DWMWA_WINDOW_CORNER_PREFERENCE,
        &cornerPref,
        sizeof(cornerPref)
    );

    if (SUCCEEDED(hr)) {
        Wh_Log(L"Restored normal corners to window");
    }
}

BOOL CALLBACK EnumWindowsCallback(HWND hWnd, LPARAM lParam) {
    if (IsValidWindow(hWnd)) {
        RestoreNormalCorners(hWnd);
    }
    return TRUE;
}

BOOL Wh_ModInit() {
    Wh_Log(L"Init - Restore Normal Corners");

    std::vector<std::wstring> excludeList;
    LPCWSTR excludeStr = Wh_GetStringSetting(L"ExcludeList");
    ParseExcludeList(excludeStr, excludeList);
    Wh_FreeStringSetting(excludeStr);
    g_isExcludedProcess = CheckExcludedProcess(excludeList);

    if (g_isExcludedProcess) {
        Wh_Log(L"Process excluded");
        return FALSE;
    }

    Wh_Log(L"Restore Normal Corners mod initialized");
    return TRUE;
}

void Wh_ModAfterInit() {
    Wh_Log(L"AfterInit - Restoring normal corners to all windows");
    EnumWindows(EnumWindowsCallback, 0);
}

void Wh_ModSettingsChanged() {
    Wh_Log(L"SettingsChanged - Restoring corners");
    EnumWindows(EnumWindowsCallback, 0);
}
