---
layout: post
title: "How to Think in Systems, Not Tickets"
date: 2026-06-23
image: /assets/images/posts/systems-thinking.jpg
author: dauble
categories:
  - "Enterprise Architecture"
---

Most developers are trained to think in tickets. A ticket arrives, you understand the requirement, you write the code, you close the ticket. This is valuable. It is also insufficient for anyone who wants to understand why the system behaves the way it does.

Systems thinking is the habit of asking a different class of question.

## The Difference Between Ticket Thinking and Systems Thinking

| Ticket Thinking                   | Systems Thinking                                             |
| --------------------------------- | ------------------------------------------------------------ |
| Why is this feature broken?       | Why does this category of failure keep appearing?            |
| How do I fix this bug?            | What made this bug possible in the first place?              |
| What does this service do?        | What does this service's behavior do to every other service? |
| Is this the right implementation? | Is this the right abstraction for the next three years?      |

Neither mode is wrong. Both are necessary. The problem arises when developers only ever operate in ticket mode — because ticket mode is optimized for now, and architecture is optimized for later.

## Feedback Loops: The Core Concept

The most important idea in systems thinking is the **feedback loop**. Every system has mechanisms that amplify or dampen behavior over time. Understanding these is the difference between building something that stays healthy and building something that slowly becomes unmanageable.

**Reinforcing loop (amplifying):**
More users → more load → slower responses → worse user experience → fewer users.
Or in a positive direction: better DX → more contributors → more features → better DX.

**Balancing loop (damping):**
High error rate → alerts fire → team investigates → root cause fixed → error rate drops.

When something in a system gets worse and worse despite fixes, you are usually fighting a reinforcing loop. When something never quite gets fully solved, you are probably in a balancing loop that has settled at an unacceptable equilibrium.

## A Practical Exercise: Map the Loops in Your System

Take a service you know well. Write down:

1. What are the inputs to this service?
2. What are the outputs?
3. Which outputs feed back into inputs — directly or through other systems?
4. What happens to behavior under load? Under failure? Under degraded dependency?

```text
Example: User authentication service

Inputs:  login requests, token validation requests, session refresh calls
Outputs: JWT tokens, session states, audit log events

Feedback paths:
- Slow token validation → frontend retries → more requests → slower validation (reinforcing)
- Expired tokens → forced re-login → more login requests at peak hours (balancing)
- Failed logins → account lockout → support tickets → account unlocks → failed logins (balancing loop with cost)
```

## The Stocks and Flows Mental Model

A "stock" is anything that accumulates — technical debt, database records, API contracts, trust between teams. A "flow" is what adds or removes from a stock.

Developers often work on flows (write code, deploy features) without tracking the stocks (accumulated complexity, growing coupling, mounting unresolved decisions). Architects track both.

```text
Stock: Monolith complexity

Flows in:  new features, quick fixes, copy-pasted modules
Flows out: refactors, service extractions, documentation, testing

The monolith grows when flows in exceed flows out — which they almost always do
unless the team deliberately invests in reducing the stock.
```

## Shifting the Habit

You cannot think in systems by reading about it. You shift the habit by practicing the right questions in your daily work:

- **Before starting a ticket:** What existing behavior in the system does this change?
- **In a code review:** What does this change do to the system's failure modes?
- **In a postmortem:** What was the feedback loop that allowed this to reach production?
- **In planning:** What stock are we growing this quarter, and is that intentional?

Systems thinking is not a framework you bolt on. It is a habit of noticing that everything is connected, that time matters, and that the most important consequences are usually the ones that arrive late.
