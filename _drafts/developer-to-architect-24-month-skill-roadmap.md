---
layout: post
title: "Developer to Architect: A 24-Month Skill Roadmap"
date: 2026-06-16
author: dauble
categories:
  - "Career"
  - "Enterprise Architecture"
---

There is no single moment when a developer becomes an architect. It is a gradual accumulation of breadth, judgment, and influence. But that accumulation can be directed. This post maps out a realistic 24-month progression that any motivated developer can follow.

## Why 24 Months?

Architecture skills develop in cycles: learn something, apply it, get feedback from production, repeat. Twelve months is too short to see real consequences of design decisions. Thirty-six months can feel abstract and distant. Twenty-four months is the practical window where meaningful changes compound.

This is not a sprint. It is a deliberate, structured shift in how you approach your work.

## Months 1–6: Expand Your System View

Most developers start with a narrow view — a service, a component, a feature. The first step is deliberately widening that view.

**Focus areas:**

- Map the full data flow for your product end-to-end, including third-party integrations
- Learn to read and write sequence diagrams, C4 diagrams, and ERDs
- Study one adjacent system your product depends on, deeply
- Start attending architecture reviews — not to present, just to listen

**Practical action:**

```bash
# Start an architecture journal — one entry per week
# What decision was made? What was the alternative? What was the tradeoff?
mkdir ~/arch-journal
touch ~/arch-journal/$(date +%Y-%m-%d)-week-notes.md
```

**Skill target:** You can diagram your full product's architecture from memory, including its external dependencies.

## Months 7–12: Make Intentional Tradeoffs

Junior developers optimize for solutions that work. Architects optimize for solutions that work _under specific constraints_ — and they can articulate those constraints clearly.

**Focus areas:**

- For every significant technical decision you make, write a one-pager explaining the alternatives you rejected
- Read at least three ADRs from well-known open-source projects
- Learn the CAP theorem and its implications for the systems you work on
- Study resiliency patterns: circuit breakers, retries with exponential backoff, bulkheads

**Code to understand deeply:**

```js
// Retry with exponential backoff — understand what this is doing, not just how to use it
async function fetchWithRetry(url, maxAttempts = 4) {
  for (let attempt = 1; attempt <= maxAttempts; attempt++) {
    try {
      const response = await fetch(url);
      if (!response.ok) throw new Error(`HTTP ${response.status}`);
      return response;
    } catch (err) {
      if (attempt === maxAttempts) throw err;
      const delay = Math.min(100 * 2 ** attempt, 5000);
      await new Promise((r) => setTimeout(r, delay + Math.random() * 100));
    }
  }
}
```

**Skill target:** You can articulate why you _did not_ choose the other two reasonable approaches to any significant decision you made.

## Months 13–18: Build Cross-Team Influence

Architecture is fundamentally a coordination problem. Technical decisions that affect more than one team require trust, communication, and political awareness — not just correctness.

**Focus areas:**

- Propose and lead one cross-team technical initiative (migration, shared library, API contract)
- Practice writing RFC-style documents — the goal is to invite disagreement productively
- Present one technical proposal to a non-technical audience and adjust the framing
- Build a personal network that spans at least three different product teams

**An RFC template to start with:**

```markdown
# RFC: [Short Title]

**Status:** Draft | **Author:** [You] | **Date:** [Date]
**Stakeholders:** [Teams/Roles Affected]

## Problem

What problem are we solving? Why now?

## Proposed Solution

What are you recommending?

## Alternatives Considered

What did you evaluate and reject, and why?

## Impact

What changes for which teams? What are the migration or adoption costs?

## Open Questions

What do you not know yet? What do you need input on?
```

**Skill target:** You have successfully driven a technical decision that required buy-in from at least two teams outside your own.

## Months 19–24: Think in Long Horizons

By this point you have breadth, tradeoff judgment, and influence skills. The final step is learning to hold multiple time horizons simultaneously: what ships this sprint, what the platform looks like in 12 months, and what the organization's technology direction is in three years.

**Focus areas:**

- Study the Three Horizons model and apply it to your current platform
- Write a 12-month technology roadmap for your product area — even if it is just for your own clarity
- Begin shadowing or contributing to enterprise architecture forums in your organization
- Identify one systemic risk in your organization's technology portfolio and socialize a mitigation

**Skill target:** You can describe the same technology situation at three different time scales (today, 12 months, 3 years) for three different audiences.

## The Non-Technical Skills That Matter Equally

Technical depth gets you noticed. These skills get you trusted:

| Skill                        | Why It Matters                                                              |
| ---------------------------- | --------------------------------------------------------------------------- |
| Written communication        | Architecture is persuasion. Clarity of writing signals clarity of thinking. |
| Active listening             | Stakeholders tell you the real constraints when they feel heard.            |
| Knowing what you do not know | Overconfidence in architecture causes expensive production failures.        |
| Conflict navigation          | Cross-team alignment always involves some version of disagreement.          |

## One Last Thing

The path from developer to architect is not a ladder — it is more of a terrain. You will move sideways, hit walls, and occasionally backtrack. The developers who make the transition successfully are not the ones who knew the most; they are the ones who stayed curious and built genuine trust across their organizations.
