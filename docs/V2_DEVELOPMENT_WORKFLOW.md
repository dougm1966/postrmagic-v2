# PostrMagic V2: UI & Backend Integration Workflow

This document outlines the official step-by-step process for developing features in PostrMagic V2. Following this workflow will ensure that the backend (database, models) and the frontend (UI components) are always synchronized.

---

### **Phase 1: UI & Component Inventory (Current Phase)**
*   [ ] **Create `docs/UI_COMPONENT_INVENTORY.md`:** A master document to track all UI elements from the legacy project.
*   [ ] **Systematically Analyze XAMPP UI:** Go through every page and component of the old project.
*   [ ] **Document Each Component:** For every UI piece (header, sidebar, forms, cards, etc.):
    *   [ ] Take a screenshot and add it to the inventory.
    *   [ ] Document its purpose and what data it needs to function.
    *   [ ] Map it to its future Laravel equivalent (e.g., Blade component, Livewire component).
*   [ ] **Approve Inventory:** Review the completed inventory to ensure nothing is missed before starting the rebuild.

### **Phase 2: Foundational Laravel Models**
*   [ ] **Eloquent Model:** For the feature being built (e.g., Posters), create the corresponding Eloquent model (`app/Models/Poster.php`).
*   [ ] **Relationships & Properties:** Define the relationships (e.g., a Poster `belongsTo` a User) and any special properties or methods within the model.

### **Phase 3: "View-First" UI Scaffolding**
*   [ ] **Create Route:** Define the URL for the new page in `routes/web.php`.
*   [ ] **Create Controller:** Create a controller that returns a Blade view, initially with empty or fake data.
*   [ ] **Create Blade View:** Create the main view file (e.g., `resources/views/dashboard.blade.php`).
*   [ ] **Copy Legacy HTML:** Copy the raw HTML structure from the old XAMPP file into the new Blade view.
*   [ ] **Verify in Browser:** Load the page to confirm the basic, unstyled HTML appears correctly.

### **Phase 4: Componentization & Data Binding**
*   [ ] **Build Components:** Based on the UI Inventory, create reusable Blade and Livewire components.
*   [ ] **Replace Static HTML:** Refactor the raw HTML in the main view, replacing it with your new components (e.g., `<x-layout.header />`, `<livewire:media-library />`).
*   [ ] **Connect Real Data:** Update the controller to fetch real data from the Eloquent model and pass it to the view.
*   [ ] **Bind Data:** Connect the controller's data to the props and variables in your components to make the UI dynamic.

### **Phase 5: Styling & Finalization**
*   [ ] **Apply Styles:** Use Tailwind CSS to style the new components to match the original design.
*   [ ] **Test End-to-End:** Thoroughly test the feature, from data retrieval to final display.
