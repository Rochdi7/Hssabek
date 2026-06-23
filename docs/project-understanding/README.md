# Project Documentation — How to Use This Folder

## Purpose

This folder contains structured documentation for the **Facturation SaaS** project.
It exists so that future Claude sessions (and developers) can understand the project quickly without rescanning the entire codebase.

---

## Files in This Folder

| File | What it contains |
|------|-----------------|
| `README.md` | This file — how to navigate the documentation |
| `models.md` | Every Eloquent model: table, purpose, fields, relationships, risks |
| `routes.md` | All route files, naming conventions, middleware stacks |
| `controllers.md` | All controllers: purpose, dependencies, key methods |
| `database.md` | Migration history, schema conventions, soft deletes, UUIDs |
| `permissions.md` | RBAC system, roles, permissions list, seeder info |
| `backoffice-ui-theme.md` | Layout, CSS classes, components, rules for new backoffice pages |
| `frontoffice.md` | Public website structure, routes, views |
| `security.md` | Known risks, CSRF, mass assignment, middleware, error handling |
| `validation.md` | Form request classes, base classes, traits, conventions |
| `known-issues.md` | Bugs, inconsistencies, and things to watch out for |
| `update-log.md` | Chronological log of every change made to this project |

---

## Rules for Using This Documentation

### Before Editing Any Code

1. Read `CLAUDE.md` at the project root first — it contains **mandatory rules**.
2. Read `update-log.md` — check if the area you're editing has recent changes.
3. Read the specific module file (e.g., `models.md` before touching a model).
4. Find the matching UI reference template before writing any Blade view.

### When to Update Documentation

- **After every change**: Add an entry to `update-log.md`.
- **When a model changes**: Update `models.md` for that model.
- **When a route changes**: Update `routes.md`.
- **When a new risk is found**: Add it to `security.md` or `known-issues.md`.

### When NOT to Rescan the Full Project

- If `update-log.md` is up to date, use the documentation here.
- Only rescan if the documentation seems incomplete or outdated relative to current code.

---

## How Future Claude Sessions Should Use This Folder

```
Step 1 — Read CLAUDE.md (project root)
Step 2 — Read docs/project-understanding/update-log.md
Step 3 — Read the relevant module doc (models.md, routes.md, etc.)
Step 4 — Code the change
Step 5 — Append entry to update-log.md
```

---

## Documentation Created

- **Date:** 2026-06-23
- **By:** Claude Code (automated scan + analysis)
- **Scan depth:** Full project — routes, models, controllers, middleware, services, views, migrations
