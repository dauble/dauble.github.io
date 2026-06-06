---
layout: post
title: "Decision-Making Under Uncertainty: A Practical Framework for Architects"
date: 2026-08-11
author: dauble
categories:
  - "Enterprise Architecture"
---

Architecture decisions are almost never made with complete information. You are choosing a database before you know exactly how your query patterns will evolve. You are selecting a cloud provider before your regulatory requirements are fully clarified. You are designing an API contract before you know who all the consumers will be.

This is not a problem to be solved. It is the nature of the work. The skill is learning to make good decisions _under_ uncertainty, not waiting until uncertainty is gone — which it never is.

## Why Architects Freeze

The most common failure mode in architectural decision-making is not making the wrong decision. It is making no decision — staying in analysis paralysis while waiting for more information that will not materially change the choice.

There are usually two root causes:

**1. Confusing reversible and irreversible decisions**
Not all decisions carry the same cost to undo. Choosing a state management library in a React app is reversible. Committing your data to a proprietary vendor-lock-in format is not. Many architects apply maximum caution to all decisions equally, which slows everything down.

**2. Seeking consensus when alignment is sufficient**
Consensus means everyone agrees. Alignment means everyone understands the decision and can work with it, even if they would have chosen differently. Many architecture decisions only need alignment, not consensus.

## The Reversibility Test

Before investing time in analyzing any decision, classify it:

```text
Is this decision easy to reverse?

EASY (weeks of effort to undo):
  → Move fast. Decide with current information.
  → Document the decision and the conditions under which you'd revisit.

MEDIUM (months of effort to undo):
  → Time-box your analysis. Identify the top two options.
  → Make the decision explicit and get alignment from affected parties.

HARD (years of effort or significant cost to undo):
  → Invest properly in analysis. Prototype where possible.
  → Sequence the decision to preserve optionality as long as practical.
  → Plan for migration from the start, even if you hope not to need it.
```

## The "Sufficient Information" Threshold

Rather than asking "do I have enough information?", ask "what additional information would change my decision?"

If you cannot identify specific information that would shift you from Option A to Option B, you already have enough to decide. The remaining uncertainty is not decision-relevant.

```text
Decision: Which message queue for async processing?

Information I have:
  - Expected message volume: 5k/hour
  - Team has AWS expertise
  - Need at least-once delivery guarantee
  - Budget: modest (startup phase)

Would any of the following change my choice?
  - Knowing the exact message schema:          No
  - Knowing peak-hour multiplier (3x vs 5x):   No, both are in SQS range
  - Knowing whether we need FIFO ordering:      YES — this would change evaluation

Decision: Get clarity on ordering requirements, then decide.
          Do not wait for anything else.
```

## Two-Way Door vs. One-Way Door

Jeff Bezos's framing of Type 1 and Type 2 decisions is one of the most useful in the decision-making literature.

**Two-way door (Type 2):** You can walk back through if it does not work. Default to: decide now, with reasonable information, and move.

**One-way door (Type 1):** You cannot easily undo. Default to: invest more analysis, preserve options longer, sequence carefully.

The error most teams make is treating two-way doors as one-way doors — slowing down reversible decisions with heavyweight process. The other error, rarer but more expensive, is treating one-way doors as two-way.

## Handling Disagreement After the Decision

Once a decision is made with appropriate rigor, the healthy pattern is **disagree and commit**. Stakeholders who preferred a different option can register their disagreement — ideally in the ADR — but they do not continue to relitigate the decision in every subsequent meeting.

This requires trust in the process. Teams that have documented their reasoning, shown they considered alternatives, and made their criteria transparent earn the right to ask for commitment even from dissenters.

```markdown
# ADR excerpt — capturing disagreement

## Decision

Use Kafka for the event streaming backbone.

## Dissent Recorded

The platform team preferred AWS Kinesis due to lower operational overhead.
After reviewing total cost of ownership and migration complexity, the architecture
committee decided Kafka's ecosystem breadth outweighed Kinesis's operational
simplicity for our scale. The platform team has committed to this decision
and their concerns have been logged for the 2027 review.
```

## The Practical Cadence

For ongoing architecture work, a lightweight decision cadence helps:

- **Immediately:** Classify new decisions as reversible or irreversible
- **Weekly:** Review open decisions older than two weeks — are they stuck, and why?
- **Quarterly:** Review past decisions for learning — what has validated and what has not?

Architects who close the loop on past decisions build credibility. Stakeholders trust decision-makers who have been right before and who have learned visibly from being wrong.
