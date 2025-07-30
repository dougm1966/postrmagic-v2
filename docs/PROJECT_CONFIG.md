# PostrMagic V2 - Project Configuration

## Path Contexts & Execution Environments

### File System Paths

| Context | Path Format | Example | Usage |
|---------|-------------|---------|-------|
| **Windows UNC Path** | `\\wsl$\Ubuntu\home\ai1offs\projects\postrmagic-v2\...` | `\\wsl$\Ubuntu\home\ai1offs\projects\postrmagic-v2\app\Models\Event.php` | For all file operations with tools (find_by_name, view_file_outline, view_line_range, etc.) |
| **Linux Path** | `/home/ai1offs/projects/postrmagic-v2/...` | `/home/ai1offs/projects/postrmagic-v2/app/Models/Event.php` | For commands to be run in WSL terminal or Docker containers |

### Execution Environments

| Environment | Context | Command Format | Example |
|-------------|---------|---------------|---------|
| **Docker Container** | WSL Terminal | `docker-compose exec laravel.test [command]` | `docker-compose exec laravel.test php artisan migrate` |
| **WSL Terminal** | Linux | Run from project root: `/home/ai1offs/projects/postrmagic-v2` | `cd /home/ai1offs/projects/postrmagic-v2 && docker-compose ps` |

## Critical Rules

1. **NEVER** use Linux paths (`/home/...`) for file operations with tools
2. **NEVER** use Windows UNC paths (`\\wsl$\...`) in Docker command examples
3. **ALWAYS** specify "Run this in your WSL terminal from the project root directory" for Docker commands
4. **ALWAYS** use `docker-compose exec laravel.test` for Laravel/PHP commands
5. **NEVER** suggest installing PHP extensions or services directly on the host system

## Docker Environment

- All services (Laravel, MySQL, Redis, etc.) run in Docker containers
- Use docker-compose commands to manage the development environment
- Database connections and services are handled through Docker networking
- When troubleshooting, always check Docker containers first
- Use docker-compose up/down to start/stop the development environment
- Logs should be checked via docker-compose logs

## Database Configuration

- **Development**: SQLite (configured in .env)
- **Production**: MySQL (via Docker)
- All migrations must be compatible with both database engines
- Database queries must work with both SQLite and MySQL

## Database Migration Best Practices

### Foreign Key Constraint Management

- **Split Migration Pattern**: For tables with foreign key dependencies:
  1. Create tables without foreign key constraints in initial migrations
  2. Add foreign key constraints in separate migrations after dependent tables exist
- **Cross-Database Compatibility**: All migrations must work in both SQLite and MySQL environments
- **Table Dependency Order**:
  1. Create all base tables first (events, tags, etc.)
  2. Add foreign key constraints in later migrations
- **Testing Migration Commands**:
  ```bash
  # Fresh migration in testing environment
  docker-compose exec laravel.test php artisan migrate:fresh --env=testing
  
  # Run tests after migrations
  docker-compose exec laravel.test php artisan test --filter=EventControllerTest
  ```

## File Permission Issues

When encountering "insufficient permissions" or inability to edit files in VS Code:

```bash
sudo chown -R $USER:$USER .
```
(Run from project root in WSL terminal to fix ownership permanently)

## Error Troubleshooting

| Error Message | Likely Cause | Solution |
|---------------|--------------|----------|
| "no configuration file provided" | Wrong directory or terminal type | Ensure you're in project root in WSL terminal |
| "Access is denied" | Permission issue | Use Docker exec approach or fix permissions |
| "Call to undefined method" | Missing trait or import in PHP | Check class imports and trait usage |

## Documentation Synchronization

The following documentation files must be kept synchronized:
1. PROJECT_PLAN.md
2. HANDOFF_DOCUMENTATION.md
3. POSTRMAGIC_V2_BUILD_STRATEGY.md

## Code Change Protocol

- NEVER provide code in chat message code blocks for fixes
- ALWAYS use propose_code tool for ANY code changes
- Even for single-line fixes, use propose_code
- The propose_code tool provides the "Apply" button that the user expects

---

*This document serves as the definitive reference for all technical configurations and requirements for the PostrMagic V2 project. All AI assistants must adhere to these specifications without exception.*
