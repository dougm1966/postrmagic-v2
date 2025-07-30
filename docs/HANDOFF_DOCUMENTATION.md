# Code Block Usage Policy

**All code blocks in this plan are literal and must be copied and used exactly as shown. No examples, placeholders, or illustrative content will ever be in a code block. Only commands or file contents intended for direct use will appear in code blocks. This policy is mandatory for all contributors and all phases of development.**


# PostrMagic V2 Project Handoff Documentation

## Code Block Usage Policy

**All code blocks in this documentation are literal and must be copied and used exactly as shown. No examples, placeholders, or illustrative content will ever be in a code block. Only commands or file contents intended for direct use will appear in code blocks.**

## Dockerized Development Environment & Command Usage Policy

**ALL development, build, and CLI commands for PostrMagic V2 must be executed inside Docker containers using `docker-compose exec`.**

- Do NOT install or run PHP, Composer, Node, or MySQL directly on your host or WSL system.
- All services (Laravel, MySQL, Redis, Node.js, etc.) run in Docker containers.
- All onboarding, migrations, seeding, and CLI tasks must use the containerized environment.
- See the project README for detailed command examples.

---

## Project Overview

PostrMagic is a web application that uses AI to transform event posters into social media content. This document serves as a handoff guide for AI assistants working on this project, built as a modern Laravel 12 application.

## Current Project Status [CRITICAL]

The project is currently in the **PHASE 1 COMPLETE - READY FOR PHASE 2** phase with the following specific status:

1. **UI Component Identification: COMPLETE**
   - All UI components have been identified and added to the inventory document
   - No missing components remain to be discovered or added to the inventory structure

2. **UI Component Detailed Documentation: COMPLETE**
   - All components are fully documented in the inventory
   - Each component includes detailed information on:
     - File references
     - Screenshot references (with consistent path formatting)
     - Component breakdown with detailed UI elements
     - Data dependencies
     - Laravel implementation mapping
   - The following components have been recently completed and verified:
     - Billing & Subscription Management: Complete with component breakdown, interaction patterns, data dependencies, screenshots
     - Admin Analytics Dashboard: Complete with component breakdown, interaction patterns, data dependencies, screenshots
     - LLM Settings & Management Interface: Complete with full documentation

3. **Screenshot References: STANDARDIZED**
   - All screenshot references now use a consistent format: `![alt text](./screenshots/filename.png)`
   - Some screenshots are marked to be created during implementation:
     - Authentication pages (login-page.png, password-reset.png, registration.png)
     - Error pages (error-404.png)

4. **Build Strategy: COMPLETE**
   - The comprehensive build strategy document has been created
   - Implementation approach, timeline, and technical specifications are fully documented

5. **Gap Analysis: COMPLETE**
   - All identified gaps in documentation have been addressed
   - No components with incomplete documentation remain
   - The gap analysis document is synchronized with the UI Component Inventory

6. **Phase 1 Database Foundation: COMPLETE**
   - Database migrations created and executed for all core models
   - Model factories implemented and tested for all core entities
   - All models properly configured with HasFactory trait
   - Feature tests created and passing for all core models

7. **Phase 1 Testing Infrastructure: COMPLETE**
   - EventTest: Passing (factory creation and database persistence)
   - MediaItemTest: Passing (factory creation and database persistence)
   - GeneratedPostTest: Passing (factory creation and database persistence)
   - TagTest: Passing (factory creation and database persistence)
   - All core model factories working correctly
   - Database schema verified and functional

8. **Development Environment: STABLE**
   - Docker containerization fully functional
   - File permission issues resolved for WSL/Docker integration
   - Consistent command execution patterns established
   - All Laravel services running properly in containers

## Next Steps

With Phase 1 complete and all testing verified, the project is ready for Phase 2: User Interface Foundation:

1. Set up Laravel development environment
2. Create initial Laravel project structure following documented component organization
3. Begin implementation following the phased approach outlined in the build strategy
4. Create missing screenshots during implementation (authentication and error pages)
5. Update documentation as needed during the development process

## Documentation Files Status [REFERENCE]

| Document                              | Status   | Description                                          | Last Updated  |
|---------------------------------------|----------|------------------------------------------------------|---------------|
| UI_COMPONENT_INVENTORY_REORGANIZED.md | COMPLETE | Contains all components with full documentation      | July 28, 2025 |
| UI_COMPONENT_GAP_ANALYSIS.md          | COMPLETE | Tracks UI components with incomplete documentation   | July 28, 2025 |
| POSTRMAGIC_V2_BUILD_STRATEGY.md       | COMPLETE | Implementation strategy and technical specifications | July 28, 2025 |
| V2_DEVELOPMENT_WORKFLOW.md            | COMPLETE | Development guidelines and best practices            | July 28, 2025 |
| POSTRMAGIC_V2_PRD.md                  | COMPLETE | Product requirements and specifications              | July 28, 2025 |

## Recently Completed Work [ACCURATE AS OF JULY 28, 2025]

- Identified and included ALL UI components in the inventory document
- Created structured inventory with clear user/admin separation
- Performed gap analysis to track components with incomplete documentation
- Added Authentication components (login, registration, password reset) to the inventory
- Added Error Pages components (404, others) to the inventory
- Created comprehensive Build Strategy document
- Completed detailed documentation for all UI components

## Required Work Before Implementation [NONE]

No tasks remain to be completed before V2 implementation can begin.

## Project Structure

### PostrMagic V2 Structure
- Located at: `\\wsl$\Ubuntu\home\ai1offs\projects\postrmagic-v2\`
- Following standard Laravel 12 directory structure
- Using Blade, Livewire, Tailwind CSS, and Alpine.js
- Documentation in `docs/` directory

## Key Documentation Files [DETAILED]

1. **UI_COMPONENT_INVENTORY_REORGANIZED.md**
   - Purpose: Primary inventory of ALL UI components
   - Status: COMPLETE
   - Organization: Separated into user-facing and admin-facing components
   - Sections:
     - 1. Landing Page Components (COMPLETE)
     - 2. User Dashboard Components (COMPLETE)
     - 3. Media Management Components (COMPLETE)
     - 4. Admin Dashboard Components (COMPLETE)
     - 5. Settings & Profile Components (COMPLETE)
     - 6. Event Management Components (COMPLETE)
     - 7. Authentication & Error Pages (COMPLETE)
   - Contains component breakdowns, legacy file references, V2 mappings, data dependencies, screenshots
   - All components have complete documentation

2. **UI_COMPONENT_GAP_ANALYSIS.md**
   - Purpose: Tracks UI components with incomplete documentation
   - Status: COMPLETE
   - No components with incomplete documentation remain
   - Will be updated as needed during implementation

3. **POSTRMAGIC_V2_BUILD_STRATEGY.md**
   - Purpose: Implementation roadmap for V2 development
   - Status: COMPLETE
   - Contains:
     - Pre-Development Planning
     - Data Migration Strategy (database schema mapping, transformation requirements)
     - Technical Architecture (layered structure, core services)
     - API Specification (RESTful structure, endpoints)
     - Development Workflow & Standards (Git workflow, code standards)
     - Implementation Order (phased approach over 12 weeks)
     - Testing & QA Strategy
     - Deployment Strategy (environments, zero-downtime approach)
     - Post-Launch Support Plans

4. **V2_DEVELOPMENT_WORKFLOW.md**
   - Purpose: Development standards and processes
   - Status: COMPLETE
   - Contains coding standards and best practices for V2

5. **POSTRMAGIC_V2_PRD.md**
   - Purpose: Product requirements and specifications
   - Status: COMPLETE
   - Contains feature specifications and user stories

## Component Implementation Details [REFERENCE]

### Authentication System
- Current Plan: Laravel Fortify/Jetstream
- Components Documented: Login page, Registration page, Password reset flow
- Features to Include: Email verification, two-factor authentication, rate limiting
- Documentation Status: COMPLETE in inventory

### Error Handling
- Current Plan: Laravel error handling system with custom pages
- Components Documented: 404 page, potentially others
- Features to Include: Error tracking for admin review
- Documentation Status: COMPLETE in inventory

### Social Media Modal
- Technical Implementation:
  - JavaScript functions: `openSocialModal(platform, event)`, `renderCurrentPost()`, `navigatePost(direction)`
  - Content structure: JavaScript object `socialMediaContent` organized by event and platform
  - Features: Interactive navigation (buttons, dots, keyboard support)
- Documentation Status: COMPLETE in inventory

### Dashboard Structure
- Implementation Plan:
  - User dashboard with appropriate sidebar
  - Admin dashboard with distinct sidebar
  - Maintain separation between user and admin interfaces
- Documentation Status: COMPLETE in inventory

### Media Management
- Implementation Plan:
  - User view: Isolated to user's own media, sortable by event
  - Admin view: Comprehensive overview of all user media (statistics, storage, usage)
- Documentation Status: COMPLETE in inventory

## Technical Requirements [REFERENCE]

- PHP 8.1+ required
- MySQL database for production
- SQLite for local development (auto-detected)
- Tailwind CSS integrated via npm
- OpenAI API integration (multi-provider system with cost tracking)
- Laravel 12 framework

## LLM Integration Requirements [REFERENCE]

### LLM Implementation Structure
- **Admin UI Components**
  - API Key Management interface for OpenAI, Anthropic, and Gemini
  - Provider Status Dashboard (enabled/disabled, connection status)
  - Prompt Management System with versioning
  - Cost Analytics Dashboard (token usage, costs, response times)
- **Core LLM Components**
  - Multi-Provider Support (OpenAI, Anthropic, Gemini)
  - Automatic Failover between providers
  - Provider Configuration by content type and event category
  - Cost Tracking system for token usage and costs
  - API Key Management at admin and user levels
- **Prompt Management**
  - Robust versioning system for prompts with full history
  - Content Type Specialization (platform-specific prompts)
  - Event Category Customization
  - Prompt Testing Framework
  - Template System with dynamic content placeholders

### LLM Integration Requirements
- **Provider Support**
  - Maintain support for OpenAI and Anthropic direct integrations
  - Add OpenRouter as a new provider option
  - OpenRouter integration should accept pasted model IDs rather than fixed list
  - Only require provider-level status indicators (not per-model)

- **Process-Specific Configuration**
  - Support configurable LLM assignment to specific processes:
    1. Poster scan (event information extraction)
    2. Content creation (social media posts)
    3. Documentation creation (help articles, FAQs, feature descriptions, pages, emails)
  - Admin UI must show process/model compatibility (e.g., vision capabilities for poster scan)
  - Admin-only configuration (users cannot select models)
  - Models should be categorized by capabilities (vision-capable vs. text-only, etc.)

- **Prompt Management System**
  - Implement robust prompt versioning system
  - Support per-process prompt management
  - Include process-specific template systems with appropriate placeholders

- **Testing Environment**
  - Create dedicated testing area separate from main settings
  - Support A/B testing between different models/prompts
  - Allow saving test results for comparison
  - Include visualization of performance metrics (speed, cost, quality)
  - Support simple qualitative ratings by admins for response quality

- **Cost Management**
  - Implement per-model and per-process cost tracking
  - Provide cost budgeting/limits features
  - Include cost comparison visualizations between models
  - Implement comprehensive cost analytics

## Implementation Sequence [AFTER DOCUMENTATION COMPLETION]

Once all documentation is complete, implementation should follow this sequence:

1. Development Environment Setup
   - Laravel 12 project skeleton
   - Docker containers (PHP, MySQL, Redis, Node.js)
   - Configuration files and environment variables

2. Core Infrastructure
   - Database migrations
   - Authentication system implementation
   - Base middleware and service providers

3. UI Foundation
   - Base layouts and templates
   - Authentication views
   - Dashboard structure

4. Core Functionality
   - Media management
   - Event management
   - Social media content generation

5. Advanced Features
   - LLM integration
   - Analytics
   - Billing system

## Critical Project Rules [MUST FOLLOW]

- Maintain STRICT separation between user and admin interfaces in documentation and implementation
- Ensure screenshot references EXACTLY match actual filenames in the screenshots folder
- Focus on accurate documentation that reflects the intended implementation for PostrMagic V2
- Follow the implementation order and approach outlined in the Build Strategy document
- Ensure components with incomplete documentation are FULLY documented before implementation begins
- Do NOT begin implementation until ALL documentation is complete and verified
- Keep UI_COMPONENT_GAP_ANALYSIS.md and UI_COMPONENT_INVENTORY_REORGANIZED.md in sync at all times

## Phase 1 Implementation Details [COMPLETED]

### Database Migrations Status
All core model migrations have been created and executed successfully:

| Migration File | Status | Columns Created |
|---|---|---|
| `2025_07_30_015110_create_events_table.php` | Complete | id, title, description, date, location, timestamps |
| `2025_07_30_015111_create_media_items_table.php` | Complete | id, filename, path, type, size, metadata, timestamps |
| `2025_07_30_015111_create_generated_posts_table.php` | Complete | id, title, content, status, scheduled_at, timestamps |
| `2025_07_30_015111_create_tags_table.php` | Complete | id, name (unique), timestamps |

### Model Factory Status
All core model factories have been implemented and tested:

| Factory File | Status | Test Coverage |
|---|---|---|
| `EventFactory.php` | Complete | Creates events with faker data for all fields |
| `MediaItemFactory.php` | Complete | Creates media items with realistic file metadata |
| `GeneratedPostFactory.php` | Complete | Creates posts with content and scheduling data |
| `TagFactory.php` | Complete | Creates unique tags with faker words |

### Model Configuration Status
All core models have been properly configured:

| Model File | HasFactory Trait | Factory Integration | Database Table |
|---|---|---|---|
| `app/Models/Event.php` | Added | Working | events |
| `app/Models/MediaItem.php` | Added | Working | media_items |
| `app/Models/GeneratedPost.php` | Added | Working | generated_posts |
| `app/Models/Tag.php` | Added | Working | tags |

### Feature Test Status
All core model feature tests have been created and are passing:

| Test File | Status | Test Coverage | Assertions |
|---|---|---|---|
| `tests/Feature/EventTest.php` | Passing | Factory creation + database persistence | 2 assertions |
| `tests/Feature/MediaItemTest.php` | Passing | Factory creation + database persistence | 1 assertion |
| `tests/Feature/GeneratedPostTest.php` | Passing | Factory creation + database persistence | 1 assertion |
| `tests/Feature/TagTest.php` | Passing | Factory creation + database persistence | 1 assertion |

**Total Test Results:** 4 tests passing, 5 assertions, ~2 second duration

### Database Seeder Status
All core model seeders have been implemented:

| Seeder File | Status | Records Created |
|---|---|---|
| `EventSeeder.php` | Complete | 10 events |
| `MediaItemSeeder.php` | Complete | 20 media items |
| `GeneratedPostSeeder.php` | Complete | 15 generated posts |
| `TagSeeder.php` | Complete | 25 tags |
| `DatabaseSeeder.php` | Updated | Calls all model seeders + creates test user |

### Development Environment Issues Resolved
- **File Permission Issues**: Resolved Docker/WSL file ownership conflicts using `sudo chown -R $USER:$USER .`
- **Migration Column Mismatches**: Fixed incomplete migration files to match factory expectations
- **Model Factory Integration**: Added missing `HasFactory` trait to all core models
- **Docker Command Consistency**: Established standardized patterns for all container operations

## Critical Development Patterns [AI ASSISTANT REQUIREMENTS]

### 1. All Code Changes in Chat Mode
- **ALWAYS** use `propose_code` tool exclusively for code changes
- This provides the "Apply" button for user convenience
- **NEVER** use inline code blocks for fixes unless explicitly requested
- Even single-line changes must use `propose_code`

### 2. Command Execution Context
- **Docker commands**: Must be run from WSL terminal in project root
- **Path format for Docker**: `/home/ai1offs/projects/postrmagic-v2`
- **Never** use Windows UNC paths (`\\wsl$\...`) in Docker commands
- **Always** specify exact terminal type and directory when providing commands

### 3. Self-Service File Investigation
- **Always** check files yourself before asking user
- Use `view_file_outline`, `view_line_range`, `list_dir`, etc.
- **Only** request user action when tools are insufficient
- When user says "look for yourself" - immediately use appropriate tool

### 4. Error Handling Protocol
- **Read** exact error messages - don't assume causes
- **Check** execution context (PowerShell vs WSL)
- **Common errors**:
  - "no configuration file provided" = wrong directory or terminal
  - "Access is denied" = use Docker exec approach
  - "Call to undefined method" = missing trait or import
- **Never** retry failed commands without fixing root cause

---

*Last Updated: July 29, 2025*
