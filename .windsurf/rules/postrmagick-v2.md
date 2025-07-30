---
trigger: always_on
---

PostrMagic V2: Development Standards & Guidelines
Key Principles
Write concise, technical code with a focus on PostrMagic V2's component-based architecture.
Follow Laravel and Livewire best practices with special attention to PostrMagic's service-oriented architecture.
Use object-oriented programming with SOLID principles as the foundation.
Prefer modular components over code duplication to support PostrMagic's extensive UI component inventory.
Use descriptive naming that reflects PostrMagic-specific domain concepts.
Follow the established PostrMagic V2 project structure and naming conventions.
Implement dependency injection using Laravel's service container throughout the application.
PHP/Laravel
Use PHP 8.1+ features when appropriate (typed properties, match expressions, attributes).
Follow PSR-12 coding standards for consistency across the codebase.
Always use strict typing: declare(strict_types=1); to prevent type coercion issues.
Utilize Laravel's built-in features while implementing PostrMagic's specific service abstractions:
PostContentService
MediaService
SchedulingService
NotificationService
BillingService
Implement proper error handling with PostrMagic-specific exception classes.
Follow the sequential database implementation strategy outlined in the build documentation.
Utilize Laravel's Eloquent ORM for all database interactions with PostrMagic's defined schema.
Implement all database relationships according to the schema design in the build strategy document.
Configure caching strategies as specified in the architecture document (Redis driver with defined TTLs).
Use Laravel's queue system with Redis for background processing of PostrMagic tasks.
Livewire
Use Livewire 3.5+ for dynamic components according to PostrMagic's UI component inventory.
Implement the component hierarchy defined in the UI component documentation.
Use Livewire's lifecycle hooks to optimize component rendering and reactivity.
Implement state management according to PostrMagic's component requirements.
Use Livewire's loading states and lazy loading for media-heavy components.
Follow the security measures outlined in the project documentation for Livewire components.
Implement proper error handling within Livewire components using PostrMagic's defined error UI patterns.
Tailwind CSS & daisyUI
Follow PostrMagic's design system using Tailwind CSS utility classes.
Utilize daisyUI components for consistent UI elements across the application.
Implement the responsive design patterns defined in the UI component inventory.
Support dark mode using Tailwind's dark mode utility and daisyUI theming.
Ensure accessibility compliance (WCAG 2.1 AA) as specified in the QA criteria.
Follow the component styling guidelines from the UI component inventory.
Development Workflow
Follow the Git workflow defined in the development standards document:
Protected main branch
Feature branch development
Pull request reviews
CI/CD pipeline integration
Follow the implementation order defined in the build strategy:
Phase 1: Environment & Foundation
Phase 2: Core Features
Phase 3: Advanced Features
Phase 4: Finalization
Adhere to the testing strategy defined in the QA documentation:
Write tests before implementing features (TDD)
Ensure automated testing via the CI/CD pipeline
Meet specified acceptance criteria
Implement proper documentation:
PHPDoc comments for all classes and methods
README updates for new features
Maintain changelog
Document complex logic with inline comments
Architecture & Organization
Follow PostrMagic V2's defined application architecture:
Presentation Layer (Web UI with Blade + Livewire)
Application Layer (Controllers, Requests, Resources)
Domain Layer (Models, Services, Events)
Infrastructure Layer (Repositories, Providers, Integrations)
Organize code according to PostrMagic's service-oriented architecture.
Implement the repository pattern for data access as specified in the architecture document.
Use Laravel's event system for decoupled code as outlined in the technical documentation.
Follow the API specifications defined in the build strategy document.
Implement the caching strategy with Redis as defined in the architecture document.
Deployment & Environments
Follow the deployment strategy outlined in the build documentation:
Development environment (local Docker setup)
Integration environment (feature integration)
Staging environment (pre-release testing)
Production environment (Laravel Forge with Digital Ocean/AWS)
Ensure database migrations maintain schema integrity throughout development.
Follow the sequential deployment process defined in the documentation.
Implement feature flags for high-risk features as specified in the rollback strategy.
PostrMagic-Specific Requirements
Implement the LLM integration using Laravel's service abstractions and queues.
Follow the media handling strategies defined in the technical documentation.
Implement the social media publishing workflow as outlined in the feature requirements.
Follow the event scheduling and notification system design from the architecture document.
Implement the billing and subscription features according to the specified requirements.
Support analytics features as defined in the UI component inventory.