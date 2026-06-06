---
layout: post
title: "How to Present Technical Strategy to Non-Technical Stakeholders"
date: 2026-08-25
author: dauble
categories:
  - "Career"
---

This is one of the highest-leverage skills an architect can develop. It is also one of the most consistently underdeveloped. Most engineers learn to communicate technical ideas to other engineers. Very few learn to communicate them to finance leaders, legal teams, product executives, or board members.

The gap is not intelligence or knowledge. It is translation.

## The Fundamental Shift

When you present to a technical audience, you lead with the _how_. When you present to a non-technical audience, you lead with the _why_ and the _so what_.

Non-technical stakeholders are not interested in the architecture diagram. They are interested in:

- What problem this solves for the business
- What the alternatives were and why you did not choose them
- What it costs — money, time, risk
- What happens if you do nothing
- What they need to approve, fund, or unblock

Everything else is implementation detail.

## Structure That Works

The **Pyramid Principle** (from Barbara Minto) is the most reliable structure for executive communication:

1. **Lead with the recommendation.** Not the analysis — the conclusion.
2. **Support with three or fewer reasons.** Executives do not have time for five supporting points. Pick the three that matter most.
3. **Back each reason with facts, not opinions.** "Our deployment reliability will improve from 94% to 99.5%" is a fact. "This will be a big improvement" is not.

```text
Example structure for a cloud migration proposal:

RECOMMENDATION
We should migrate our CMS platform to a cloud-native architecture by Q2 2027.

REASON 1: COST
Current infrastructure costs $X/month for Y availability.
Cloud-native reduces operational cost by 35% after 18 months.

REASON 2: RISK
On-premise infrastructure faces end-of-support in March 2027.
Continued operation after that date creates compliance risk.

REASON 3: CAPABILITY
Cloud-native platform enables content personalization capabilities
marketing has prioritized for three consecutive planning cycles.

WHAT WE NEED
Approval to begin vendor evaluation and budget of $X for discovery phase.
```

## What Not to Do

**Do not use acronyms without spelling them out.** Even if you said it once, say it again. "AEM — that's Adobe Experience Manager — is the platform that manages our web content."

**Do not defend your recommendation with technical arguments.** "The legacy stack uses an unsupported version of Java" is a technical argument. "Our current platform cannot receive security patches, which creates regulatory exposure" is a business argument. The second one gets budget.

**Do not present options without a recommendation.** Showing three options and asking stakeholders to choose is abdication, not collaboration. They are relying on your expertise. Present options to show you did the analysis — but make clear which one you are recommending and why.

**Do not front-load the background.** Everyone in the room already knows the context. Spending the first five minutes explaining the current state before getting to the recommendation loses the audience. Lead with the recommendation; use the context as support.

## Handling Technical Questions From Non-Technical Audiences

When a non-technical stakeholder asks a question that has a highly technical answer, use the **bridge technique**:

1. Acknowledge the question
2. Translate to the business impact
3. Offer to follow up with technical detail offline

**Example:**

_"Why can't we just upgrade the current system instead?"_

Response: "That's a fair question. We evaluated that option. The challenge is that upgrading in place would require nine months of work with significant delivery risk, and we'd still end up on infrastructure we'd need to replace within two years. The migration path we're proposing is twelve months but leaves us on a platform with a much longer supported life. I can walk through the technical analysis with your team offline if that would be helpful."

## A Simple Visual Rule

For executive presentations, follow the rule of **one message per slide**. Every slide title should be a complete sentence expressing the conclusion, not a topic.

```text
Bad slide title:  "Platform Options"
Good slide title: "Option 2 Delivers the Best Risk-Adjusted Value"

Bad slide title:  "Current Architecture"
Good slide title: "Our Current Platform Will Reach End-of-Support in 14 Months"
```

A stakeholder who reads only the slide titles should be able to reconstruct your entire argument. If they cannot, your structure needs work.
