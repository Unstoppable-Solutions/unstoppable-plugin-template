# __PLUGIN_SLUG__

> This file is for Claude Code sessions working on this repo. For a human-oriented overview see `README.md`.

## What this plugin does

__PLUGIN_SHORT_DESCRIPTION__

- **Main PHP file:** `__PLUGIN_SLUG__.php`
- **Code prefix:** `__PREFIX___` (constants / class prefix); `__prefix___` (lowercase for options / tables)
- **Package:** `__PLUGIN_PACKAGE__`
- **WordPress.org slug:** `__PLUGIN_SLUG__`
- **WP.org URL:** https://wordpress.org/plugins/__PLUGIN_SLUG__/

## Base44 Pro mapping

- **Base44 app:** _(none yet — fill in when a Pro version is scaffolded there)_
- When updating code that affects both the free (this repo) and the Base44 Pro app, apply the matching change in both places in the same session.

## Release workflow

Releases are deployed to WordPress.org SVN automatically by GitHub Actions. The workflow is identical across every `unstoppable-solutions/*` plugin:

1. Finish feature work on `main`.
2. Bump the version in **all** of these:
   - `__PLUGIN_SLUG__.php` — `Version:` header
   - `__PLUGIN_SLUG__.php` — `__PREFIX___VERSION` constant (if present)
   - `readme.txt` — `Stable tag:`
   - `readme.txt` — add a `== Changelog ==` entry
3. Commit and push `main`.
4. On GitHub, create a new **Release** tagged `vX.Y.Z` (semver) with the changelog in the body.
5. The `deploy-to-wporg.yml` workflow fires and pushes the release to WP.org SVN.

## CI

Every push and PR runs the official WordPress Plugin Check against the codebase (`.github/workflows/plugin-check.yml`). CI must pass before merging. The deploy workflow (`.github/workflows/deploy-to-wporg.yml`) only fires on published Releases.

**Secrets used by deploy:** `SVN_USERNAME`, `SVN_PASSWORD` — org-level secrets on `unstoppable-solutions`. Nothing per-repo.

Both workflows carry an `if: ${{ ! github.event.repository.is_template }}` guard, so they are inert on the template itself (where placeholder tokens like `__PLUGIN_SLUG__` would otherwise fail Plugin Check parsing).

## Known phpcs:ignores specific to this plugin

_(none yet — add here as you ignore specific checks, one bullet per site, with the rationale.)_

## Shared conventions across the Unstoppable Solutions org

- **GPL-2.0-or-later** on everything.
- **One author** for Contributors: in `readme.txt`: `paramedic192` (Dave Stevens).
- **Tested up to** is bumped as WordPress ships each new .x.
- **Plugin Check CI config** (`.github/workflows/plugin-check.yml`) is standard across the org: `exclude-checks: late_escaping` + `exclude-files` lists the GitHub-only files (`.github`, `.distignore`, `.gitignore`, `.gitattributes`, `README.md`, `CLAUDE.md`, `SECURITY.md`, `CONTRIBUTING.md`, `CHANGELOG.md`).
- **`.distignore`** keeps GitHub-only files out of the WP.org zip (CI, docs, this file).
- **Prefer `phpcs:ignore` + inline rationale** over removing the ignored check from CI entirely — a specific ignore documents the decision at the call site; a check removal silently covers future code too.
- **Don't `-c user.email=` with a random identity** when committing — use `fieldmedics4@gmail.com` / `Dave Stevens` for authorship, with Claude as Co-Authored-By.

## Working with the plugin from Claude Code

- When Claude attaches this repo in a future session, this file loads automatically.
- Workflow for a bugfix / feature:
  1. Make the change on `main` (or a branch).
  2. Watch Plugin Check CI — do not merge red.
  3. For a release: follow the Release workflow section above.
- The free plugin and its Pro add-on live in **separate repos**. This repo is the free side; Pro has its own repo (private) when it exists.

## Repository layout

Standard WordPress plugin layout — `__PLUGIN_SLUG__.php` is the bootstrap, `includes/` holds the classes, `assets/` holds CSS/JS, `languages/` holds the `.pot`, `readme.txt` is the WP.org directory listing, `.github/` holds the CI and deploy workflows.
