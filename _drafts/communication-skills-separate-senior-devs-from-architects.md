---
layout: post
title: "The Communication Skills That Separate Senior Developers from Architects"
date: 2026-07-21
author: dauble
categories:
  - "Career"
---

The most technically skilled person in a room is rarely the most influential architect in that room. This is not unfair — it reflects a genuine truth about what architecture work requires.

Architecture is a coordination problem. It involves aligning people who have different incentives, different vocabularies, and different time horizons. Technical correctness is the entry requirement. Communication is what gets decisions made.

## The Four Communication Shifts

### 1. From Precision to Clarity

Senior developers communicate with technical precision. Architects communicate for clarity.

**Precision:** "The latency spike is caused by lock contention on the PostgreSQL shared buffer pool during peak write amplification from the denormalized schema."

**Clarity:** "The database slows down under load because we are writing the same data too many times. We have two options to fix it, with different tradeoffs in time and risk."

The precise version is accurate. The clear version is actionable for a broader audience. Architects need both — precision with engineers, clarity with everyone else.

### 2. From Solving to Framing

Developers are trained to solve problems. Architects are trained to frame them.

Framing a problem means defining:

- What the actual problem is (not the symptom)
- What success looks like
- What constraints bound the solution space
- What the decision-making criteria are

When architects walk into a room and immediately propose a solution, they often close off better options that stakeholders might have surfaced if given the chance. The discipline of framing first, solving second, is one of the most valuable habits you can develop.

```text
Poor framing: "We need to rewrite the API layer."

Better framing: "Our current API layer is causing three categories of problems:
  1. Slow time-to-market for new consumer apps (6 weeks per integration)
  2. Reliability incidents when a single downstream service fails
  3. No standard authentication pattern across products

  We have three options to address these, with different investment profiles..."
```

### 3. From Debate to Decision-Making

Technical discussions between developers often look like debates: two people advocating for their preferred approach until one runs out of arguments. This works fine for small decisions among people with shared context.

At the architecture level, the goal is not to win the argument — it is to reach a good, documented, reversible-where-possible decision. That requires a different set of skills:

- Explicitly naming the decision that needs to be made
- Separating opinions from evidence
- Distinguishing reversible decisions (move fast) from irreversible ones (move carefully)
- Ensuring the person who will live with the decision most has the most weight in it

The DACI framework (Driver, Approver, Contributor, Informed) is a lightweight tool for clarifying decision ownership:

```text
DACI for "Choose API Gateway Platform":
  Driver:       Platform Architect (that's you)
  Approver:     Engineering VP
  Contributors: Backend Tech Leads from each domain
  Informed:     Frontend teams, Security, Finance
```

### 4. From Writing Code to Writing Documents

The most neglected communication skill in the transition from developer to architect is **written communication** — not technical documentation, but strategic written communication.

Architecture Decision Records, technology roadmaps, platform strategy briefs, and RFC documents all require the ability to write clearly for an audience that includes both technical and non-technical readers.

A few principles that help:

**Lead with the conclusion.** Decision-makers read the first paragraph. Put the recommendation, the rationale in one sentence, and the alternatives considered at the top — not buried at the end.

**Use visuals for structure, not decoration.** A diagram that shows the before and after state of an architecture change communicates more than three paragraphs of text.

**Distinguish facts from recommendations.** "We have 47 services that call the user service directly" is a fact. "We should introduce an identity mesh layer" is a recommendation. Keep them clearly separated.

## What to Practice This Week

Pick one technical decision you are involved in this week. Before the meeting where it gets discussed:

1. Write a one-page framing document: problem, success criteria, constraints, options
2. Share it before the meeting, not during
3. In the meeting, start by asking if anyone has questions or corrections to the framing before discussing solutions

This single habit — framing before solving — will make you noticeably more effective in architecture conversations within a few months of consistent practice.
