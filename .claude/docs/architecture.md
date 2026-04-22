> **Note to Claude Code and developers:**
> This is a reference document. It is NOT automatically loaded by Claude.
> Claude loads this file on-demand for complex tasks.
> Active CLAUDE.md in the plugin root references this via `@docs/architecture.md`.
>
> This file answers "how does it work now?" — CLAUDE.md answers "how should new code be written?".

---

# Architecture — Moj Admin Notice

## File Structure

```
moj-admin-notice/
├── CLAUDE.md
├── docs/
│   └── architecture.md       ← this file
├── moj-admin-notice.php      ← main plugin file, hooks only
├── includes/
│   └── class-admin-notice.php ← notice logic
└── languages/
    └── moj-admin-notice.pot
```

## Constants

| Constant          | Value                       | Description      |
| ----------------- | --------------------------- | ---------------- |
| `MAN_VERSION`     | `1.0.0`                     | Plugin version   |
| `MAN_PLUGIN_DIR`  | `plugin_dir_path(__FILE__)` | Absolute path    |
| `MAN_TEXT_DOMAIN` | `moj-admin-notice`          | i18n text domain |

## WordPress Hooks Registered

| Hook            | Function                  | File                   | Description        |
| --------------- | ------------------------- | ---------------------- | ------------------ |
| `admin_notices` | `man_display_notice()`    | class-admin-notice.php | Renders the notice |
| `admin_init`    | `man_register_settings()` | class-admin-notice.php | Registers options  |

## Options Stored

| Option Key        | Type   | Default                    | Description                      |
| ----------------- | ------ | -------------------------- | -------------------------------- |
| `man_notice_text` | string | `'Hello from Claude Code'` | Notice message                   |
| `man_notice_type` | string | `'info'`                   | info / success / warning / error |

## Notice Types

WordPress admin notice classes used:

- `notice-info` — blue
- `notice-success` — green
- `notice-warning` — yellow
- `notice-error` — red

All notices use `is-dismissible` class by default.

## No Custom Database Tables

All data stored via WordPress Options API (`get_option` / `update_option`).
