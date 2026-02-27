# Login Test Credentials

## Super Admin (SaaS Owner)

- **Email:** `superadmin@facturation.local`
- **Password:** `superadmin123`
- **Role:** Super Administrator (manages entire system)
- **Tenant ID:** NULL (no specific tenant)
- **Access:** /admin/dashboard

## Company Admin (Localhost Tenant)

- **Email:** `admin@localhost.local`
- **Password:** `admin123`
- **Role:** Administrator (manages own tenant)
- **Tenant ID:** localhost
- **Access:** /backoffice/dashboard

## Manager (Localhost Tenant)

- **Email:** `rochdi.karouali@glszentrum.com`
- **Password:** `password`
- **Role:** Manager
- **Tenant ID:** localhost
- **Access:** /backoffice/dashboard (limited permissions)

## Receptionist (Localhost Tenant)

- **Email:** `test@example.com`
- **Password:** `password`
- **Role:** Receptionist
- **Tenant ID:** localhost
- **Access:** /backoffice/dashboard (limited permissions)

## How It Works

### Super Admin Login Flow:

1. Visits `/login` from any domain
2. Enters super admin credentials
3. System checks if user has `tenant_id = NULL` (super admin)
4. Redirects to `/admin/dashboard` (super admin area)
5. No tenant validation needed

### Company Admin Login Flow:

1. Visits `/login` from localhost domain
2. Enters company admin credentials
3. System verifies user belongs to localhost tenant
4. Redirects to `/backoffice/dashboard` (tenant area)
5. Can only access localhost tenant data

## Login Behavior

- **Super Admin**: Can access from any domain/subdomain directly
- **Tenant Users**: Must access from their specific tenant domain
- **Invalid Credentials**: Shows error message, credentials stay in form
- **Success**: Shows welcome message, redirects to dashboard
- **Inactive Account**: Shows specific error message about account status
