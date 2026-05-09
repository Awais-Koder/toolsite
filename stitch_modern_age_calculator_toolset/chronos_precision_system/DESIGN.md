---
name: Chronos Precision System
colors:
  surface: '#f7f9fb'
  surface-dim: '#d8dadc'
  surface-bright: '#f7f9fb'
  surface-container-lowest: '#ffffff'
  surface-container-low: '#f2f4f6'
  surface-container: '#eceef0'
  surface-container-high: '#e6e8ea'
  surface-container-highest: '#e0e3e5'
  on-surface: '#191c1e'
  on-surface-variant: '#45464d'
  inverse-surface: '#2d3133'
  inverse-on-surface: '#eff1f3'
  outline: '#76777d'
  outline-variant: '#c6c6cd'
  surface-tint: '#565e74'
  primary: '#000000'
  on-primary: '#ffffff'
  primary-container: '#131b2e'
  on-primary-container: '#7c839b'
  inverse-primary: '#bec6e0'
  secondary: '#0051d5'
  on-secondary: '#ffffff'
  secondary-container: '#316bf3'
  on-secondary-container: '#fefcff'
  tertiary: '#000000'
  on-tertiary: '#ffffff'
  tertiary-container: '#271901'
  on-tertiary-container: '#98805d'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#dae2fd'
  primary-fixed-dim: '#bec6e0'
  on-primary-fixed: '#131b2e'
  on-primary-fixed-variant: '#3f465c'
  secondary-fixed: '#dbe1ff'
  secondary-fixed-dim: '#b4c5ff'
  on-secondary-fixed: '#00174b'
  on-secondary-fixed-variant: '#003ea8'
  tertiary-fixed: '#fcdeb5'
  tertiary-fixed-dim: '#dec29a'
  on-tertiary-fixed: '#271901'
  on-tertiary-fixed-variant: '#574425'
  background: '#f7f9fb'
  on-background: '#191c1e'
  surface-variant: '#e0e3e5'
typography:
  display:
    fontFamily: Inter
    fontSize: 48px
    fontWeight: '700'
    lineHeight: '1.1'
    letterSpacing: -0.02em
  h1:
    fontFamily: Inter
    fontSize: 32px
    fontWeight: '700'
    lineHeight: '1.2'
    letterSpacing: -0.01em
  h2:
    fontFamily: Inter
    fontSize: 24px
    fontWeight: '600'
    lineHeight: '1.3'
  h3:
    fontFamily: Inter
    fontSize: 20px
    fontWeight: '600'
    lineHeight: '1.4'
  body-lg:
    fontFamily: Inter
    fontSize: 18px
    fontWeight: '400'
    lineHeight: '1.6'
  body-md:
    fontFamily: Inter
    fontSize: 16px
    fontWeight: '400'
    lineHeight: '1.5'
  label-caps:
    fontFamily: Inter
    fontSize: 12px
    fontWeight: '600'
    lineHeight: '1.2'
    letterSpacing: 0.05em
  mono-data:
    fontFamily: JetBrains Mono
    fontSize: 14px
    fontWeight: '500'
    lineHeight: '1.4'
rounded:
  sm: 0.125rem
  DEFAULT: 0.25rem
  md: 0.375rem
  lg: 0.5rem
  xl: 0.75rem
  full: 9999px
spacing:
  base: 8px
  container-max: 1200px
  gutter: 24px
  section-gap: 64px
  stack-sm: 12px
  stack-md: 24px
  stack-lg: 40px
---

## Brand & Style
This design system is engineered for utility and cognitive ease. It targets professionals, developers, and researchers who require immediate, accurate time-related calculations without visual friction.

The style is **Modern Minimalist with a Corporate backbone**. It leverages extreme clarity, a monochromatic base for structural elements, and a singular high-energy accent color to guide the eye toward conversion and interaction points. The emotional response is one of reliability, precision, and efficiency. By emphasizing a flat aesthetic with surgical use of depth, the design system ensures that data is the protagonist, not the interface.

## Colors
The palette is rooted in **Slate** and **Royal Blue**. 
- **Slate-50** serves as the primary canvas to minimize eye strain.
- **Slate-900** is used for primary text to ensure maximum contrast and legibility (WCAG AAA).
- **Royal Blue-600** acts as the surgical strike color, reserved exclusively for primary calls to action, active states, and critical highlights.
- **AdSense Placeholders** use a neutral **Slate-100** background to maintain visual harmony while clearly demarcating advertising zones from tool content.

## Typography
This design system utilizes **Inter** as the primary typeface for its exceptional legibility in digital interfaces and its neutral, systematic character. 

- **Hierarchy:** Use bold weights for headers to create clear entry points.
- **Letter Spacing:** Headlines utilize slight negative tracking to feel more "locked in," while small labels use increased tracking for readability.
- **Mono Usage:** While Inter is the default, technical time strings (e.g., ISO-8601 timestamps) should utilize a secondary monospaced font to ensure character alignment in tabular data.

## Layout & Spacing
The layout follows a **Fixed-Width Centered Grid** for desktop (1200px max) and a fluid single-column for mobile. 

- **Rhythm:** An 8px base unit governs all dimensions.
- **Whitespace:** Generous padding is applied to tool containers to separate data inputs from outputs. 
- **Ad Placement:** AdSense blocks are placed in high-visibility but non-disruptive areas (e.g., sidebar or between tool and article). These must use `min-height` properties matching the expected ad unit (e.g., 250px or 600px) to eliminate Cumulative Layout Shift (CLS).

## Elevation & Depth
The design system employs a **Flat-Plus** approach. Surfaces are primarily 2D, with depth used only to indicate interactivity or containment.

- **Level 0 (Canvas):** Slate-50.
- **Level 1 (Cards):** Pure white background with a 1px Slate-200 border. 
- **Level 2 (Shadows):** Used only for the "Tool Container" to elevate it from the background. Apply a soft, diffused shadow: `0 4px 6px -1px rgb(0 0 0 / 0.05), 0 2px 4px -2px rgb(0 0 0 / 0.05)`.
- **Interaction:** On hover, primary buttons may increase shadow depth slightly to provide tactile feedback.

## Shapes
The system uses **Soft (0.25rem)** roundedness to maintain a professional, slightly technical appearance. 

- **Buttons & Inputs:** 4px (0.25rem) radius.
- **Tool Cards:** 8px (0.5rem) radius to define them as the primary content areas.
- **Ads:** Keep 0px or 4px radius to distinguish them clearly from internal UI components.

## Components
### Buttons
- **Primary:** Royal Blue-600 background, White text. High contrast, sharp edges.
- **Secondary:** White background, Slate-200 border, Slate-900 text.
- **Ghost:** Transparent background, Blue-600 text, for less important utility actions.

### Tool Containers (Cards)
White surfaces that house time calculators or converters. They must feature a clear "Input" section and a "Result" section, separated by a thin Slate-100 divider. Results are displayed in a larger font size with the `mono-data` typography style.

### Semantic Articles
Content sections below tools use standard Markdown hierarchy. Use a maximum line width of 70 characters for optimal reading comfort.

### AdSense Placeholders
Fixed-dimension containers with a background of Slate-100. A small "Advertisement" label in `label-caps` is centered or top-aligned within the placeholder to manage user expectations before the ad loads.

### Input Fields
Large, accessible touch targets with a 1px Slate-300 border. On focus, the border transitions to Royal Blue-600 with a 2px blue ring (20% opacity) for accessibility.