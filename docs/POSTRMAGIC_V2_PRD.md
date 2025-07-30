# Product Requirements Document: PostrMagic

## 1. Project Vision & Purpose

*   **App Vision:** To become the essential marketing tool for event organizers by automating the creation of high-quality social media content directly from their event posters.
*   **Core Problem Statement:** Event organizers have a primary marketing asset—the event poster—but lack the time and resources to consistently convert its message into effective, text-based social media content. PostrMagic solves this by instantly transforming a poster image into ready-to-use text for social campaigns.
*   **Target Users:**
    *   **Primary:** Event Organizers in the sports bar ecosystem (Billiards, Darts, etc.).
    *   **Secondary:** Organizers of live music events and concerts.
    *   **Tertiary:** Event Stakeholders (venues, sponsors) identified from the poster.

## 2. Core Features Specification

*   **Poster Analysis & Text Generation:** A user uploads an image of an event poster. The system uses a configurable LLM (via OpenRouter) to scan the image and extract key event details. Based on this data, a second configurable LLM generates three free, text-only social media posts.
*   **Content Delivery & Event Claiming:** The generated text posts are delivered to the organizer via email/SMS, along with a unique link to "claim" their event.
*   **Monetization & Content Packages:** After claiming an event, the organizer can purchase packages for more text-based content, such as a "post-a-day" series or post-event follow-up content.
*   **Media Library & Post Customization:** Organizers have a personal Media Library to upload their own event photos. They can then select any AI-generated text post and attach one of their own images to create a complete social media post.
*   **Dashboard Ecosystem:** A suite of dashboards allows users to manage their events and media. The Admin Dashboard includes an LLM Management Interface to select the AI models used for poster scanning and text generation.

## 3. Technical & Design Guidelines

*   **Backend Framework:** Laravel (PHP)
*   **Frontend Interactivity:** Livewire or Alpine.js
*   **Database:** MySQL
*   **AI Gateway:** OpenRouter
*   **Key Integrations:** Twilio (SMS), Resend (Email), Stripe (Payments).

# Technical Specification Document: PostrMagic

## 1. System Architecture Overview

The application is a monolithic system built on the Laravel framework. All AI-related tasks will be routed through **OpenRouter**, which acts as a central gateway to various Large Language Models. The specific models used for vision analysis and text generation will be dynamically configurable via a `settings` table controlled by the Admin Dashboard. All long-running tasks will be handled asynchronously using Laravel's queue system.

## 2. Database Schema

*   **`users`**: (Laravel Jetstream default) `id`, `name`, `email`, `password`, etc.
*   **`events`**: `id`, `user_id` (FK), `original_poster_path` (string), `name`, `event_date`, `status` ('pending', 'claimed', 'archived'), `extracted_data` (JSON).
*   **`media_items`**: `id`, `user_id` (FK), `filepath`, `filename`. (Stores the organizer's own photos).
*   **`generated_posts`**: `id`, `event_id` (FK), `content` (TEXT, stores the AI-generated text only), `is_free` (boolean).
*   **`tags`**: `id`, `name`, `slug`.
*   **`taggables`**: (Polymorphic Pivot) `tag_id`, `taggable_id`, `taggable_type`.
*   **`payments`**: `id`, `user_id` (FK), `stripe_id`, `amount`, `status`.
*   **`settings`**: `id`, `key` (string, unique), `value` (string), `description` (text, nullable).

## 3. Core Logic Flow: Poster-to-Text Pipeline

1.  **Upload:** A user POSTs an image to `/events/upload`.
2.  **Store & Queue:** The poster image is stored. A `ProcessPosterJob` is dispatched.
3.  **Job Execution (Background):**
    *   The job queries the `settings` table to get the `value` for the `llm_vision_model` key.
    *   It constructs an API request to the **OpenRouter API**, passing the poster image and the retrieved model identifier.
    *   The extracted data is saved to the `events` table.
    *   A `GenerateTextContentJob` is dispatched.
4.  **Content Generation (Background):**
    *   This job queries the `settings` table to get the `value` for the `llm_text_model` key.
    *   It constructs an API request to the **OpenRouter API**, passing a prompt and the retrieved model identifier.
    *   The system generates exactly three free text posts which are saved to the `generated_posts` table with `is_free` set to true.
    *   A `SendNotificationJob` is dispatched.
5.  **Notification (Background):** An email/SMS is sent with the text content and a unique claim link.
6.  **Additional Content Purchase Flow:**
    *   When a user returns and purchases additional content packages, a new `GenerateAdditionalContentJob` is dispatched.
    *   This job generates the purchased content types (e.g., post-a-day series, follow-up posts) based on the package.
    *   These additional posts are saved to the `generated_posts` table with `is_free` set to false.
    *   The posts are immediately available in the user's dashboard after purchase and processing.

## 4. Admin Dashboard Functionality

*   **LLM Management Interface:**
    *   Located at `/admin/settings/llm`.
    *   Features two dropdown menus: "Poster Scanning Model" and "Text Generation Model," populated with a curated list of compatible models from OpenRouter.
    *   Saving the form updates the `settings` table, dynamically changing the models used in the background jobs.


# User Stories & Acceptance Criteria: PostrMagic (MVP)

### Epic: Core Content Generation

*   **Story 1: Poster Upload for Text Generation**
    *   **As a** guest user,
    *   **I want to** upload an image of an event poster,
    *   **so that** the system can scan it and generate text-based social media content for me.
    *   **Acceptance Criteria:**
        1.  The form clearly states it accepts poster images (`.jpg`, `.png`).
        2.  Upon successful upload, a confirmation message is displayed.
        3.  The poster image is sent to a background queue for processing.

*   **Story 2: Receiving Free Text Content**
    *   **As an** event organizer,
    *   **I want to** receive an email/SMS containing my 3 free text-only posts,
    *   **so that** I can immediately see the value and be encouraged to claim my event.
    *   **Acceptance Criteria:**
        1.  The message contains the plain text of the 3 generated posts.
        2.  The message includes a unique link to claim the event.

### Epic: Content Customization & Management

*   **Story 3: Media Library Management**
    *   **As an** event organizer,
    *   **I want to** upload my own event photos to a personal Media Library,
    *   **so that** I have a collection of images ready to be paired with my text posts.
    *   **Acceptance Criteria:**
        1.  I can access a "Media Library" page from my dashboard.
        2.  I can upload multiple images at once.
        3.  My uploaded photos are displayed as thumbnails in a private gallery.

*   **Story 4: Combining Text and Images**
    *   **As an** event organizer,
    *   **I want to** select a generated text post and attach an image from my Media Library to it,
    *   **so that** I can create a complete, visually appealing social media post.
    *   **Acceptance Criteria:**
        1.  In my Event Manager dashboard, each text post has an "Attach Image" option.
        2.  Clicking it opens a view of my Media Library.
        3.  After selecting one of my images, I see a preview of the final post.
        4.  I have options to copy the text and download the image.

### Epic: Platform Administration

*   **Story 5: LLM Model Management**
    *   **As an** administrator,
    *   **I want to** select which AI models are used for poster scanning and text creation from a central dashboard,
    *   **so that** I can optimize the platform's performance and cost without needing to deploy new code.
    *   **Acceptance Criteria:**
        1.  An "LLM Settings" page exists in the Admin Dashboard.
        2.  The page displays the currently active models for "Poster Scanning" and "Text Generation."
        3.  I can select a new model for each function from a dropdown list.
        4.  Clicking "Save" updates the system configuration.
        5.  All subsequent AI jobs use the newly selected models.
