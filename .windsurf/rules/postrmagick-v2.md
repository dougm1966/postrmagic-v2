---
trigger: always_on
---

# CRITICAL SAFETY RULES - NEVER VIOLATE THESE

## File Deletion Safety
- NEVER suggest destructive commands (rm, clean, delete) without explicit user approval
- ALWAYS show exactly what files will be affected before any deletion
- ALWAYS suggest backup steps before destructive operations
- REQUIRE user to run dry-run commands (-n flag) before actual deletion
- WARN about .env files, config files, and custom user data before suggesting cleanup

## Protected Files
- .env (contains critical configuration)
- Custom migrations and seeders
- User-created documentation
- Any file containing API keys or secrets
- Custom configuration files

## Command Safety Protocol
1. Before suggesting any destructive command:
   - List exactly what will be affected
   - Suggest backup steps
   - Require user confirmation
   - Provide dry-run option first

2. For git operations:
   - Always suggest git stash before major changes
   - Warn about uncommitted changes
   - Show git status before destructive operations

3. For environment setup:
   - Never assume .env can be recreated easily
   - Always backup existing configuration
   - Ask about existing setup before making changes

# PostrMagic V2: Development Standards & Guidelines
[Rest of the rules same as above...]
