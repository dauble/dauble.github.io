---
layout: post
title: "Writing Architecture Decision Records That Teams Actually Use"
date: 2026-09-01
image: /assets/images/posts/architecture-decision-records.jpg
author: dauble
categories:
  - "Enterprise Architecture"
---

Architecture Decision Records (ADRs) are one of the most valuable and most underused tools in software architecture. When they work, they eliminate the "why did we build it this way?" conversation that every team has repeatedly. When they do not work, they are stale documents that no one reads and no one updates.

The difference between ADRs that get used and ADRs that get ignored comes down to five practices.

## What an ADR Is

An ADR is a short document that captures a significant architectural decision — including the context, the options considered, the decision made, and its consequences. The key word is _significant_. Not every technical choice needs an ADR. The ones that do are:

- Decisions that are hard to reverse
- Decisions that affect more than one team
- Decisions that trade off values the organization cares about
- Decisions that future developers will need to understand to work effectively

## The Template That Works

There are many ADR templates. The one that survives in practice tends to be the simplest:

```markdown
# ADR-NNN: [Short, imperative title]

## Status

[Draft | Proposed | Accepted | Deprecated | Superseded by ADR-XXX]

## Date

YYYY-MM-DD

## Context

What is the problem or situation that forced this decision?
What are the forces at play — technical, business, regulatory, organizational?
Write this as neutral context, not as advocacy for a particular solution.

## Decision

What is the decision? State it clearly and unambiguously.
Use the active voice: "We will use X" not "X was selected."

## Alternatives Considered

What else did you evaluate?
For each alternative: what is it, and why was it rejected?

## Consequences

What becomes easier or harder as a result of this decision?
What is the known impact on performance, team capability, cost, or delivery?
What decisions does this open up or close off?

## Review Date (optional)

If this decision should be revisited under specific conditions, state them here.
```

## Five Practices That Make ADRs Stick

**1. Write them before the decision, not after**
An ADR written after the fact is a post-hoc rationalization. The value of an ADR is in the _process_ of writing it — clarifying what you actually believe, surfacing alternatives, and forcing articulation of tradeoffs. Write the draft, circulate it for feedback, then finalize it after the decision is made.

**2. Store them in the repository, next to the code**
ADRs stored in Confluence or a shared drive accumulate drift. When the code and the ADR live in the same repository, they get updated together — or at least the discrepancy becomes visible during code review.

```text
my-service/
  docs/
    architecture/
      decisions/
        ADR-001-database-choice.md
        ADR-002-authentication-strategy.md
        ADR-003-api-versioning-approach.md
      README.md    ← index linking all decisions
```

**3. Number them sequentially and never delete them**
ADRs record the thinking at a point in time. When a decision changes, write a new ADR that supersedes the old one — do not edit the original. This preserves the history of _why_ things changed, which is often as valuable as knowing what changed.

**4. Keep them short**
An ADR longer than two pages will not be read. If you cannot explain the context, decision, alternatives, and consequences in one to two pages, you either have more than one decision bundled together or you are including implementation details that belong elsewhere.

**5. Make them part of the PR process**
The most effective teams require an ADR or a reference to an existing ADR for any PR that makes a significant architectural change.

```markdown
# PR template addition

## Architecture Decision

[ ] This change aligns with existing ADRs (cite them)
[ ] This change requires a new ADR (include draft or link)
[ ] This change is not architecturally significant (briefly explain why)
```

## A Real Example

```markdown
# ADR-007: Use JWTs with short expiry for API authentication

## Status

Accepted — 2025-11-14

## Context

Our API is consumed by both browser-based SPAs and server-to-server integrations.
We need a stateless authentication mechanism that works across both contexts.
The security team has flagged opaque session tokens as difficult to audit
across distributed services.

## Decision

We will use JSON Web Tokens (JWTs) with a 15-minute expiry for API access.
Refresh tokens with 7-day expiry will be stored in httpOnly cookies for browser clients.
Server-to-server clients will use client credentials flow with 1-hour expiry tokens.

## Alternatives Considered

**Opaque session tokens (Redis-backed):** Provides easy revocation but requires a
centralized session store — a single point of failure and a coupling concern
for our distributed architecture.

**Long-lived JWTs:** Simpler to implement but significantly worsens the blast radius
of a token leak. Rejected based on security team recommendation.

## Consequences

- Stateless verification reduces coupling between services
- Easy to audit and inspect token claims in logs

* Cannot immediately revoke tokens within the 15-minute window
* Requires clients to implement token refresh logic
* Short expiry may cause friction for long-running browser sessions

## Review Date

Revisit if we move to an identity provider with native token binding support
(e.g., FIDO2-bound tokens). Estimated review: 2027 Q1.
```

## Getting Started

If your team does not have ADRs today, start with the last three significant architecture decisions you can remember. Write them up retroactively. Share them with your team. Ask for corrections. This establishes the habit and often surfaces disagreements about past decisions that are still actively affecting current work.
