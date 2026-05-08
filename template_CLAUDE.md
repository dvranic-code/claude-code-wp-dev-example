# Project: [Ime]

## WHAT

Custom WordPress plugin for [funkcija]. Target: WP 6.5+, PHP 8.1+.

## MANDATORY FIRST STEP

Before ANY non-trivial change, you MUST read docs/architecture.md.
Triggers: adds new feature / touches multiple files / modifies existing behavior

## HOW

### Security

- Every AJAX handler MUST start with check_ajax_referer()
- Never trust $\_POST directly — wp_unslash() + sanitize
- floatval()/absint() for numeric input
- Escape ALL output: esc_html(), esc_attr(), esc_url()
- DB queries via $wpdb->prepare()

### Naming + Structure

- Prefix all functions, classes, options, hooks
- if (!defined('ABSPATH')) exit; na vrhu svakog PHP fajla
- Methods over 50 lines = split

## COMMANDS

- phpcs --standard=WordPress src/
- phpunit

## NEVER

- Never remove nonce/capability check from AJAX
- Never print/echo exception messages in AJAX context
- Never bypass $wpdb->prepare()
