---
layout: post
title: "The Three Horizons Model: Shipping Today While Designing for Three Years Out"
date: 2026-07-14
image: /assets/images/posts/three-horizons-model.jpg
author: dauble
categories:
  - "Enterprise Architecture"
---

One of the most disorienting parts of growing into an architecture role is learning to hold multiple time frames in your head simultaneously. Your sprint team wants to know what ships this week. Your product manager wants to know what is landing next quarter. Your CTO wants to know where the platform will be in three years.

These are not three separate conversations. They are three lenses on the same system. The Three Horizons model is a framework for navigating all three at once.

## The Model

Originally developed by McKinsey and adapted widely in technology strategy, the Three Horizons model divides work into three concurrent categories:

**Horizon 1 — Core business today**
What keeps the lights on and generates current value. In technology terms: the systems and features your users depend on right now. Investment here is about reliability, performance, and incremental improvement.

**Horizon 2 — Emerging opportunities**
The investments that are not yet generating full return but will in 12–24 months. Platform migrations, new technology adoptions, capability gaps being closed. These require sustained investment with uncertain near-term returns.

**Horizon 3 — Transformational bets**
Longer-horizon explorations — often R&D, proofs of concept, or strategic explorations — that could redefine what the organization does. These are small investments now with potentially large payoffs later.

```text
Value ^
      |                                           H3 (small bets, uncertain)
      |                              H2 (growing investment, emerging return)
      |   H1 (core, reliable, well-funded)
      +---------------------------------------------------> Time
     Now                                               3 Years
```

## Why Developers Often Only See Horizon 1

Product teams are optimized for H1. The roadmap is quarterly. The backlog is prioritized by immediate user value. This is rational — it is how products survive. But it creates a systematic blindspot.

Technical debt accumulates in H1 without ever being addressed because it does not fit the urgency model. Platform migrations sit perpetually in H2 because the return is not visible until later. H3 never gets explored because there is no sprint for exploration.

Enterprise architects exist partly to protect H2 and H3 from being consumed by H1 indefinitely.

## Applying This to Your Platform

A practical exercise: take your current technology portfolio and categorize your investments across three horizons.

```text
Example (pharma digital platform):

H1 (operational excellence):
  - Patient portal performance and availability
  - HCP-facing CRM integrations
  - Existing CMS content workflows

H2 (capability building):
  - Moving from monolith to modular services
  - Adopting AEP for unified customer data
  - Maturing CI/CD pipeline with automated security gates

H3 (transformational exploration):
  - AI-powered clinical trial recruitment personalization
  - Generative AI in medical content authoring
  - Decentralized identity for patient data portability
```

The distribution matters as much as the categorization. If 95% of investment is H1, the organization is running in place. If too much sits in H3 without H1 stability, nothing gets delivered reliably.

## The Architect's Job in Each Horizon

**In H1:** Defend quality, resist shortcuts that increase long-term cost, ensure operational reliability standards are met.

**In H2:** Champion migration efforts, manage the technical risk of transition, create clear on-ramps and off-ramps for teams adopting new patterns.

**In H3:** Run structured experiments, time-box explorations, create learning loops that feed insights back into H2 planning.

## A Practical Bias: Most H2 Work Fails Without an H1 Funding Model

The most common failure mode for H2 investment is that it is funded episodically. Teams get budget for a platform migration, make partial progress, then get pulled back into H1 emergencies. The migration stalls, trust in the new platform erodes, and the organization remains on the old platform for years longer than planned.

The architectural fix is to _attach H2 investment to H1 deliverables_. Migrate a piece of the platform as part of delivering an H1 feature. Make H2 progress the path of least resistance for H1 work. This requires intentional sequencing and close collaboration with product management — but it is the most reliable way to make H2 investments actually complete.

## Further Reading

The original McKinsey framing of Three Horizons has been critiqued and extended by many practitioners. Steve Blank's updated treatment — "McKinsey's Three Horizons Model Defined Innovation for Years. Here's Why It No Longer Applies." — is worth reading as a counterpoint, particularly his argument that in fast-moving technology contexts, H3 innovations can collapse into H1 far faster than the original model assumed.

Both views are worth holding: the original model as a planning discipline, and Blank's critique as a reminder that pace of change matters in how you apply it.
