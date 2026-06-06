---
layout: post
title: "What Junior Developers Should Learn First: Design, Ops, or Security?"
date: 2026-06-30
author: dauble
categories:
  - "Career"
  - "Enterprise Architecture"
---

Ask ten senior developers what a junior should focus on first and you will get ten different answers. Some say master the fundamentals. Others say learn cloud and DevOps immediately. A few say security is the most valuable differentiator.

They are all partially right. Here is a more principled answer.

## The Three Domains

**Design** covers how software is structured — patterns, abstractions, APIs, data models, and the tradeoffs between them.

**Ops** covers how software runs — deployment, monitoring, scaling, incident response, and the infrastructure beneath it all.

**Security** covers how software is protected — threat modeling, authentication, authorization, dependency risk, and secure design principles.

These three are not sequential. They are more like three lenses through which you view the same system.

## What Happens When You Skip One

### Skipping Design

Systems become tangled. Features become expensive to change. Every new addition requires touching five other files. This is the path to code that no one wants to inherit.

### Skipping Ops

You write software that works on your laptop and fails in production in ways you did not anticipate. You cannot interpret logs during an incident. You have no idea what your code costs to run or why it is slow.

### Skipping Security

You ship vulnerabilities you do not know are there. You miss authentication gaps, pass user input directly into queries, and store secrets in places they do not belong.

```js
// A security mistake many junior developers make:
app.get("/user", async (req, res) => {
  const query = `SELECT * FROM users WHERE id = ${req.query.id}`; // SQL injection
  const result = await db.query(query);
  res.json(result);
});

// Correct approach using parameterized queries:
app.get("/user", async (req, res) => {
  const result = await db.query("SELECT * FROM users WHERE id = $1", [
    req.query.id,
  ]);
  res.json(result);
});
```

## A Recommended Learning Order

The most pragmatic sequence for a junior developer aimed at long-term enterprise career growth:

**Year 1: Design fundamentals first**
Learn to write readable, maintainable, testable code. Understand SOLID principles not as dogma but as heuristics. Practice designing small APIs and understand why your choices matter.

**Year 1 parallel: Security minimums**
You cannot wait until later for security. Learn the OWASP Top 10. Understand what SQL injection, XSS, and broken access control actually look like in code — not just the names. This takes two focused weekends, not two years.

**Year 2: Ops awareness**
Start reading your logs in production. Understand what a Kubernetes pod is, what a health check does, and what the difference between a 502 and a 503 tells you about your system. You do not need to become an SRE — you need to be literate.

**Year 2+: Go deeper on what your organization values most**
Cloud architecture in a heavy AWS shop. Frontend performance if you are on a consumer-facing product. Data architecture if you are near ML systems.

## The Underrated Fourth Domain: Communication

None of the above matters at scale unless you can communicate your technical understanding clearly. At the junior level that means:

- Writing clear commit messages and PR descriptions
- Asking precise questions ("it returns 401 when the token is valid because..." not "it doesn't work")
- Documenting your decisions, however small

The developers who grow fastest are rarely the ones who know the most. They are the ones who communicate clearly, ask good questions, and build trust with everyone around them.

## A Quick Self-Assessment

If you are not sure where to start, run through these checks:

```text
Design:
  [ ] Can I explain the single responsibility principle with a real example?
  [ ] Can I design a REST API with appropriate HTTP verbs and status codes?
  [ ] Can I write a unit test before I write the implementation?

Ops:
  [ ] Can I read an application log and identify the cause of a failure?
  [ ] Can I deploy my application to a cloud environment without hand-holding?
  [ ] Do I know how to set an environment variable securely?

Security:
  [ ] Can I identify at least three OWASP Top 10 vulnerabilities in code?
  [ ] Do I know how to store passwords correctly (bcrypt/argon2, never plaintext)?
  [ ] Do I know where my application's secrets live and who can access them?
```

Every unchecked box is a learning priority. Start with the one that would cause the most damage if left unaddressed.
