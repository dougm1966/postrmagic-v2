# PostrMagic V2: LLM Settings & Management Interface

## Overview

The LLM Settings & Management Interface provides administrators with a comprehensive toolset to configure, manage, test, and monitor all aspects of the AI language model integration within PostrMagic. This document details the components, interactions, and implementation requirements for this critical admin-only interface in the V2 Laravel application.

## Current Implementation Analysis

### Core Files
- **Admin UI:** `admin/llm-settings.php`
- **Core Provider Logic:** `includes/llm-manager.php`
- **Prompt Management:** `includes/llm-prompt-manager.php`

### Current Capabilities
- Multi-provider support (OpenAI, Anthropic, Gemini)
- Provider configuration by content type and event category
- Automatic failover between providers based on priority
- Prompt management with versioning (up to 4 versions retained)
- Prompt testing with real API integration
- Cost tracking and analytics
- Admin and user-level API key management
- Process-specific model assignment

### Database Schema
The current implementation utilizes the following tables:
- `llm_providers`: Stores provider information (name, display_name, api_base_url, is_enabled)
- `llm_configurations`: Stores provider configurations per content type and event category
- `llm_prompts`: Stores current prompt versions
- `llm_prompt_versions`: Archives historical prompt versions
- `llm_usage_logs`: Detailed API call logging
- `llm_cost_tracking`: Aggregated cost data for analytics

## V2 Requirements

### Provider Support
- Continue supporting OpenAI and Anthropic
- Add OpenRouter as a new provider
- Support for adding OpenRouter models by ID (no fixed list)
- Provider-level status indicators

### Process-Specific Configuration
- Enhanced assignment system for LLM providers and models per system process:
  1. Poster scan (event information extraction)
  2. Content creation (social media posts)
  3. Documentation creation (new process)
- Clear visual indication of model-process compatibility (e.g., vision capability required for poster scan)
- Model categorization by capabilities (vision-capable vs. text-only)

### Prompt Management
- Implement robust prompt versioning system
- Enhanced support for per-process prompt templates
- Improved placeholder management system
- Enhanced testing interface with comparative features

### Cost Management
- Enhanced tracking of costs per model and process
- Cost budgeting and limits functionality
- Enhanced visualization tools for cost comparison
- Migration utility for historical cost data

## Component Architecture

### 1. Tabbed Navigation Structure

The interface is organized into four primary tabs:

#### 1.1. Providers Tab
- Provider Configuration Table
- Add/Edit Provider Form
- Process-Model Assignment Matrix

#### 1.2. Prompts Tab
- Prompt Filtering Controls
- Prompts Table
- Add/Edit Prompt Form
- Version History Panel

#### 1.3. Testing Tab
- Prompt Selection Controls
- Test Data Editor
- Results Display
- A/B Testing Panel

#### 1.4. Analytics Tab
- Summary Statistics
- Usage Tables
- Visualization Charts
- Export Controls

## Component Details

### 2.1. Providers Tab

#### Provider Configuration Table
- **Purpose:** Displays all configured LLM providers with their status and configurations
- **Features:**
  - Provider name and logo display
  - Status indicator (active/inactive)
  - Default model selection
  - API key status indicator (configured/missing)
  - Actions column (edit, test connection, delete)
  - Process assignment summary
- **Sorting/Filtering:**
  - Sort by name, status, last used
  - Filter by process type

#### Add/Edit Provider Configuration Form
- **Fields:**
  - Provider selection dropdown (OpenAI, Anthropic, OpenRouter)
  - API key input (with encryption)
  - API key source toggle (admin/user)
  - Default model dropdown (provider-specific)
  - Organization ID (for OpenAI)
  - Base URL override (optional)
  - Status toggle (enabled/disabled)
  - Process assignment section:
    - Checkboxes for each system process
    - Model selection per process
    - Priority order per process

#### Process-Model Assignment Matrix
- **Layout:** Grid with processes as rows and providers as columns
- **Cell Content:**
  - Model selection dropdown
  - Priority order input
  - Compatibility indicator
- **Features:**
  - Visual highlighting of incompatible selections
  - Drag-and-drop priority reordering
  - Bulk edit capabilities

### 2.2. Prompts Tab

#### Prompt Filtering Controls
- **Filters:**
  - Process type (poster scan, content creation, etc.)
  - Event category (optional)
  - Content type/platform (optional)
  - Status (active, archived)

#### Prompts Table
- **Columns:**
  - Prompt type/process
  - Associated event category (if any)
  - Content type/platform (if any)
  - Current version number
  - Last modified date
  - Created by user
  - Actions (edit, test, version history, delete)

#### Add/Edit Prompt Form
- **Fields:**
  - Prompt type selection
  - Event category dropdown (optional)
  - Content type/platform dropdown (optional)
  - System prompt textarea
  - User prompt textarea
  - Assistant prompt textarea (optional)
  - Placeholder management section:
    - Available placeholders list
    - Description of each placeholder
    - Insert button to place at cursor position
  - Version notes field

#### Version History Panel
- **Features:**
  - Timeline of versions with dates and authors
  - Diff view between versions
  - Rollback button for each version
  - Version notes display

### 2.3. Testing Tab

#### Prompt Selection Controls
- **Fields:**
  - Prompt type dropdown
  - Event category filter (if applicable)
  - Content type filter (if applicable)
  - Specific prompt version selector

#### Test Data Editor
- **Features:**
  - JSON editor for test data input
  - Template generator based on prompt placeholders
  - Save/load test data sets
  - Validation against required placeholders

#### Results Display
- **Features:**
  - Formatted output display
  - Raw JSON response option
  - Response metadata:
    - Tokens used (input/output)
    - Cost calculation
    - Response time
    - Provider and model used
  - Save result button
  - Rate quality button (1-5 stars)

#### A/B Testing Panel
- **Features:**
  - Side-by-side comparison of two test results
  - Metrics comparison table
  - Quality rating comparison
  - Highlighting of differences

### 2.4. Analytics Tab

#### Summary Statistics
- **Cards:**
  - Total API requests (with period-over-period change)
  - Total cost (with period-over-period change)
  - Average response time
  - Success rate percentage

#### Usage Tables
- **Tables:**
  - Usage by provider and model
  - Usage by process type
  - Usage by user (admin view only)
  - Daily/weekly/monthly breakdown

#### Visualization Charts
- **Charts:**
  - Cost trend line chart
  - Provider usage pie chart
  - Process usage bar chart
  - Response time histogram

#### Export Controls
- **Features:**
  - Date range selection
  - Format selection (CSV, JSON)
  - Include/exclude field selection
  - Export button

## Data Flow & Dependencies

### 3.1. Database Schema

#### `llm_providers` Table
```
id              - INT (PK)
name            - VARCHAR(50)     // internal name (e.g., 'openai')
display_name    - VARCHAR(100)    // user-friendly name
api_base_url    - VARCHAR(255)    // API endpoint URL
is_enabled      - BOOLEAN         // provider status
created_at      - TIMESTAMP
updated_at      - TIMESTAMP
```

#### `llm_configurations` Table
```
id              - INT (PK)
provider_id     - INT (FK)
content_type    - VARCHAR(50)     // e.g., 'poster_scan', 'content_creation'
event_category  - VARCHAR(50)     // optional category association
model_name      - VARCHAR(100)    // specific model name
priority_order  - INT             // for fallback sequence
requires_vision - BOOLEAN         // whether model requires vision capabilities
is_enabled      - BOOLEAN
created_at      - TIMESTAMP
updated_at      - TIMESTAMP
```

#### `llm_prompts` Table
```
id                  - INT (PK)
prompt_type         - VARCHAR(50)     // e.g., 'poster_scan', 'content_creation'
event_category      - VARCHAR(50)     // optional category association
content_type        - VARCHAR(50)     // optional platform/content type
system_prompt       - TEXT
user_prompt         - TEXT
assistant_prompt    - TEXT            // optional for few-shot learning
placeholders        - JSON            // available placeholders for the prompt
version_number      - INT             // current version number
created_by_user_id  - INT (FK)
created_date        - TIMESTAMP
version_notes       - TEXT
```

#### `llm_prompt_versions` Table
```
id                  - INT (PK)
prompt_id           - INT (FK)
version_number      - INT
system_prompt       - TEXT
user_prompt         - TEXT
assistant_prompt    - TEXT
placeholders        - JSON
created_by_user_id  - INT (FK)
created_date        - TIMESTAMP
version_notes       - TEXT
```

#### `llm_usage_logs` Table
```
id                  - INT (PK)
provider_id         - INT (FK)
model_name          - VARCHAR(100)
user_id             - INT (FK)
event_id            - INT (FK)        // optional event association
prompt_id           - INT (FK)        // prompt used
content_type        - VARCHAR(50)
input_tokens        - INT
output_tokens       - INT
estimated_cost      - DECIMAL(10,6)   // in USD
response_time_ms    - INT
success             - BOOLEAN
error_message       - TEXT            // if failure
created_at          - TIMESTAMP
```

#### `llm_cost_tracking` Table
```
id                  - INT (PK)
provider_id         - INT (FK)
user_id             - INT (FK)        // optional user association
event_category      - VARCHAR(50)     // optional category
content_type        - VARCHAR(50)
date_period         - DATE
total_requests      - INT
successful_requests - INT
total_input_tokens  - INT
total_output_tokens - INT
total_cost          - DECIMAL(10,6)   // in USD
avg_response_time_ms- INT
created_at          - TIMESTAMP
updated_at          - TIMESTAMP
```

### 3.2. Backend Services

The interface will be powered by the following Laravel services:

#### LLM Manager Service
- Provider and configuration management
- API key handling with encryption
- API calls with automatic fallback
- Cost tracking and analytics

#### LLM Prompt Service
- Prompt CRUD operations
- Version management
- Placeholder handling
- Test execution

#### LLM Analytics Service
- Usage data aggregation
- Cost tracking and calculations
- Chart data preparation
- Export functionality

## Implementation Guidelines

### 4.1. Laravel Livewire Components

The interface will be implemented using Laravel Livewire components:

```
app/Livewire/Admin/LLM/
├── Index.php               # Main container with tab navigation
├── Providers/
│   ├── Index.php           # Providers tab main component
│   ├── ProviderForm.php    # Add/edit provider form
│   ├── ConfigTable.php     # Provider configuration table
│   └── AssignmentMatrix.php# Process-model assignment matrix
├── Prompts/
│   ├── Index.php           # Prompts tab main component
│   ├── Table.php           # Prompts listing table
│   ├── Form.php            # Add/edit prompt form
│   ├── VersionHistory.php  # Version history panel
│   └── PlaceholderHelper.php# Placeholder insertion helper
├── Testing/
│   ├── Index.php           # Testing tab main component
│   ├── PromptSelector.php  # Prompt selection controls
│   ├── DataEditor.php      # Test data JSON editor
│   ├── ResultsDisplay.php  # Test results display
│   └── ComparisonPanel.php # A/B testing panel
└── Analytics/
    ├── Index.php           # Analytics tab main component
    ├── SummaryCards.php    # Summary statistics cards
    ├── UsageTables.php     # Usage data tables
    ├── Charts.php          # Visualization charts
    └── ExportTools.php     # Export functionality
```

### 4.2. UI Design Guidelines

#### Theme Consistency
- Match the admin dashboard color scheme and styling
- Support dark/light mode toggle from main app
- Use consistent card and table styling

#### Layout
- Responsive design with appropriate breakpoints
- Mobile-friendly tab navigation (collapses to dropdown on small screens)
- Consistent padding and spacing

#### Interactive Elements
- Use transition animations for tab switching
- Apply loading indicators during API operations
- Implement toast notifications for actions
- Use consistent button styling across the interface

### 4.3. Security Considerations

#### API Key Protection
- Encrypt all API keys in the database
- Mask API keys in the UI (show only last 4 characters)
- Implement proper authorization checks for all routes
- Use Laravel's encryption facilities

#### Access Control
- Restrict access to admin users only
- Add additional permission checks for API key management
- Log all critical actions for audit purposes

#### Data Protection
- Implement rate limiting for API testing
- Set reasonable limits on test token usage
- Sanitize all user inputs

## Migration Considerations

### Data Migration

The migration process will involve:

1. Creating migration scripts for the new database schema
2. Mapping existing data to new structure
3. Preserving historical cost and usage data
4. Migrating provider configurations
5. Migrating prompts with version history

### Functional Equivalence

The implementation must maintain functional equivalence while adding the new features:

1. All existing provider configurations must work in PostrMagic V2
2. All existing prompts must be preserved with version history
3. Historical usage data should be accessible in the analytics interface
4. Existing API keys should continue to function

## Testing Plan

### 6.1. Unit Tests
- Provider configuration management
- Prompt version management
- Cost calculation logic
- API interaction layer

### 6.2. Integration Tests
- Provider fallback mechanism
- Prompt testing with mock API responses
- Analytics data aggregation

### 6.3. UI Tests
- Component rendering and interaction
- Form validation and submission
- Tab navigation and state preservation

### 6.4. End-to-End Tests
- Complete prompt management workflow
- Provider configuration and testing
- Analytics generation and export

## Implementation Timeline

1. **Database Schema Implementation**: 1 day
2. **Core Services Development**: 3 days
3. **Livewire Component Development**: 5 days
4. **UI Implementation**: 3 days
5. **Testing & Refinement**: 3 days
6. **Data Migration**: 1 day

Total estimated time: **2 weeks**

## Conclusion

The LLM Settings & Management Interface is a critical component of the PostrMagic V2 system, providing administrators with powerful tools to configure and monitor AI language model integration. This document provides comprehensive guidance for implementing this interface in the Laravel V2 application, ensuring both functional equivalence with the existing system and the addition of new, enhanced features.

By following these specifications, the development team will deliver a robust, user-friendly interface that enables effective management of the system's AI capabilities, cost tracking, and performance optimization.
