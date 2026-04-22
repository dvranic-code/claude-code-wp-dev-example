# Project: Moj Admin Notice

## WHAT

Simple WordPress plugin that displays a custom admin notice in wp-admin.
Target: WordPress 6.5+, PHP 8.1+. Single developer project.

## MANDATORY FIRST STEP

Before planning any change that adds new hooks, new options, or touches
multiple files — read `docs/architecture.md` first.

Exceptions (skip architecture.md):

- Single-line fix
- Typo or rename in one file
- Read-only explanation

## HOW

### Security

- Every PHP file starts with `if (!defined('ABSPATH')) exit;`
- Escape ALL output: `esc_html()`, `esc_attr()`, `esc_url()`
- Capability check before any output: `current_user_can('manage_options')`
- Sanitize ALL input: `sanitize_text_field()`, `absint()`

### Naming

- Prefix all functions: `man_` (moj-admin-notice)
- Prefix all options: `man_option_name`
- Prefix all hooks: `man_hook_name`

### Structure

- Named functions only — no anonymous functions on hooks
- `wp_enqueue_script()` / `wp_enqueue_style()` — never inline
- Strings via `__()` / `esc_html__()` with text domain `moj-admin-notice`

## COMMANDS

- Lint: `./vendor/bin/phpcs --standard=WordPress .`
- Autofix: `./vendor/bin/phpcbf --standard=WordPress .`

## NEVER

- Never echo without escaping
- Never skip ABSPATH check
- Never use anonymous functions on hooks
- Never hardcode user-facing strings without i18n
