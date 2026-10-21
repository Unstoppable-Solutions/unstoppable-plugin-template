# Unstoppable Plugin Template

A ready-to-fork scaffold for new **Unstoppable Solutions** WordPress plugins. Click the green **Use this template** button above to spin up a new plugin repo with the same CI, auto-deploy workflow, and Unstoppable Solutions conventions already in place.

## What's in the box

- Main plugin file with a WordPress.org-compliant header
- `includes/class-plugin.php` — stub main class, activation / deactivation / admin-menu hooks already wired
- `readme.txt` skeleton in the WordPress.org format (Description, Installation, FAQ, Screenshots, Privacy, Changelog, Upgrade Notice sections)
- `uninstall.php` stub
- `.github/workflows/plugin-check.yml` — runs the official WordPress Plugin Check on every push and PR
- `.github/workflows/deploy-to-wporg.yml` — on a published GitHub Release, auto-deploys to WordPress.org SVN (dormant until the plugin is accepted into the directory)
- `.distignore` so dev-only files (workflows, README.md, SECURITY.md) don't end up in the WordPress.org zip
- `.gitignore` with sensible defaults for a PHP / WordPress project
- Silence `index.php` in every directory

## How to use

### 1. Create your new repo

Click **Use this template** → **Create a new repository**.

- **Repository name:** `unstoppable-your-plugin-slug` (lowercase-hyphens, must match the WordPress.org slug you plan to submit)
- **Visibility:** Public
- Create

### 2. Clone it locally

```bash
git clone https://github.com/paramedic192/unstoppable-your-plugin-slug.git
cd unstoppable-your-plugin-slug
```

### 3. Replace the template placeholders

Six tokens appear throughout the files. Replace them everywhere with your real plugin's values:

| Placeholder | Example value | Where it appears |
|---|---|---|
| `__PLUGIN_NAME__` | `Unstoppable My Plugin` | Human-readable name shown to users |
| `__PLUGIN_SLUG__` | `unstoppable-my-plugin` | Slug, text domain, filenames |
| `__PLUGIN_PACKAGE__` | `Unstoppable_My_Plugin` | @package annotation, class namespace |
| `__PLUGIN_SHORT_DESCRIPTION__` | `Does one thing well on your WordPress site.` | Plugin header + readme.txt subtitle |
| `__PREFIX__` | `UMPL` | 4-letter uppercase prefix for constants / classes |
| `__prefix__` | `umpl` | Lowercase prefix for option names, table suffixes |
| `__TAG1__` ... `__TAG5__` | `polls, voting, elections, ballot, surveys` | WordPress.org tags (max 5) |

A quick way to do all six at once on macOS / Linux (edit the values first):

```bash
PLUGIN_NAME="Unstoppable My Plugin"
PLUGIN_SLUG="unstoppable-my-plugin"
PLUGIN_PACKAGE="Unstoppable_My_Plugin"
PLUGIN_DESC="Does one thing well on your WordPress site."
PREFIX_UPPER="UMPL"
PREFIX_LOWER="umpl"

# Replace tokens in all tracked text files:
git ls-files | xargs -I{} sed -i.bak \
  -e "s|__PLUGIN_NAME__|${PLUGIN_NAME}|g" \
  -e "s|__PLUGIN_SLUG__|${PLUGIN_SLUG}|g" \
  -e "s|__PLUGIN_PACKAGE__|${PLUGIN_PACKAGE}|g" \
  -e "s|__PLUGIN_SHORT_DESCRIPTION__|${PLUGIN_DESC}|g" \
  -e "s|__PREFIX__|${PREFIX_UPPER}|g" \
  -e "s|__prefix__|${PREFIX_LOWER}|g" \
  {}

# Clean up the backup files sed makes:
find . -name "*.bak" -delete

# Rename the main plugin file to match the slug:
git mv __PLUGIN_SLUG__.php "${PLUGIN_SLUG}.php"
```

Then edit `readme.txt` to replace the `__TAG1__` through `__TAG5__` placeholders with your real WordPress.org tags.

### 4. Commit and push

```bash
git add -A
git commit -m "Scaffold new plugin from unstoppable-plugin-template"
git push origin main
```

The **Plugin Check** workflow will run against the clean scaffold. Fix anything it flags before writing your own code.

### 5. When ready for WordPress.org

- Submit the plugin at https://wordpress.org/plugins/developers/add/
- Once accepted, add two secrets at **Settings → Secrets and variables → Actions**:
  - `SVN_USERNAME` — your WordPress.org username
  - `SVN_PASSWORD` — your WordPress.org SVN password (generate at https://profiles.wordpress.org/<you>/profile/edit/group/3/?screen=svn-password)
- Create a GitHub Release tagged `v0.1.0` (or whatever your first release version is). The deploy workflow fires and pushes `trunk/` and `tags/` to WordPress.org SVN automatically.

## Conventions

Every plugin created from this template inherits:

- GPL-2.0-or-later license (the exact string the WordPress.org directory requires)
- Author: Unstoppable Solutions, Author URI: https://unstoppablesolutions.app
- Contributor: `paramedic192`
- Four-plus character class / constant prefixes (never `WC_` or any WordPress-reserved prefix)
- ABSPATH guard at the top of every PHP file
- Nonces + capability checks on every state change
- `$wpdb->prepare()` on every database query
- No outbound HTTP calls unless the plugin is explicitly a service integration (per WordPress.org Guideline 7)

## License

GPL-2.0-or-later. See the main plugin file header.
