---
layout: post
title: "Did My Day Get Worse? Building an LED Status Monitor for the Services You Depend On"
date: 2026-11-27
image: /assets/images/posts/did-my-day-get-worse.jpg
author: dauble
categories:
  - "Projects"
  - "Internet of Things"
  - "Hardware"
---

How many times have you opened an application and assumed the problem was with your code, only to discover that GitHub, AWS, or another service was already having a bad day? That small moment of uncertainty is what inspired [Did My Day Get Worse](https://github.com/dauble/did-my-day-get-worse), an ESP32-powered LED strip that turns live service status into a glanceable signal.

The project is deliberately simple. A WS2812B LED strip sits near the workspace and communicates at a glance whether the important parts of the internet are healthy.

## The Idea

The status light borrows from the network-status build popularized in I Like To Make Stuff's "I Built a 3D Printed Network Monitor" video. Instead of checking each service in a dashboard, the firmware polls status APIs and maps the overall result to one of four visual states:

| Services in outage | LED behavior |
| ------------------ | ------------ |
| 0 | Sky-blue chasing breathing wave |
| 1–2 | Yellow pulse |
| 3 or more | Red pulse |
| No result yet | Blue |

There is also a priority rule for connectivity: if the ESP32 cannot reach the internet, the strip turns red immediately instead of reporting misleading results for individual services.

## Hardware and Wiring

The bill of materials is intentionally small:

- An ESP32 development board
- A WS2812B or NeoPixel LED strip
- A 5 V power supply
- A 300–500 Ω resistor on the data line
- A 1000 µF capacitor across the strip power

The strip's data-in pin connects to GPIO 18, ground is shared with the ESP32, and 5 V power can come from the board or a larger external supply. The project recommends supplying power directly for longer strips and sharing ground with the controller. A resistor and capacitor add protection and reduce the chance of data or power noise causing erratic behavior.

## How the Firmware Works

Every minute, the firmware follows a small, predictable workflow:

1. Check internet reachability through a list of plain-HTTP probe URLs.
2. If the probes fail, show red and skip service polling.
3. If the connection is healthy, fetch the status JSON for each configured service.
4. Count a service as impaired unless its status indicator is `none`.
5. Update the LED strip based on the resulting outage count.

The project uses the `SERVICES` array in `include/config.h` for this configuration. A typical entry looks like this:

```cpp
{"GitHub", "https://www.githubstatus.com/api/v2/status.json"},
```

Most Atlassian Statuspage deployments expose a similar `/api/v2/status.json` endpoint. One line of configuration gives the firmware a name for serial logging and a URL to poll.

## The Two-Layer Health Check

The internet check is a useful distinction from service polling. An ISP or local Wi-Fi failure should not look like every cloud provider is down. The firmware first asks whether a public HTTP probe answers with status 204. This means it can clearly distinguish "the entire internet connection is unavailable" from "GitHub is degraded."

That separation drives the visual model:

- Red for lost internet or enough service outages
- Yellow for a small number of degraded services
- Blue while booting or waiting for a valid result
- Sky blue for a healthy system

The pulse colors and timing are configurable in `config.h`, including brightness, pulse speed, chase speed, and the threshold for turning red.

## Setup with VS Code and PlatformIO

The project is built for the VS Code PlatformIO workflow:

1. Install the PlatformIO IDE extension.
2. Open the repository folder.
3. Copy `include/secrets.example.h` to `include/secrets.h`.
4. Enter the Wi-Fi credentials and customize `include/config.h`.
5. Build, upload, and open the serial monitor at 115200 baud.

For a one-time Wi-Fi setup and hardware build, that is a manageable level of complexity. It also gives the project useful diagnostic output while it tests internet and service status.

## What Makes It Useful

The strongest part of the project is not the LED animation. It is the way it creates a physical, ambient signal for a condition that most people otherwise discover through interruption:

- A dashboard tab does not need to stay open.
- Email and Slack alerts do not need to interrupt a conversation.
- A quick glance provides enough information to decide whether to keep debugging or stop touching the system.

It is especially useful for developers and operators who depend on a small set of external platforms and want to know when the environment is healthy before starting a long build or deployment.

## Small Project, Good Architecture

Did My Day Get Worse also demonstrates a few useful engineering principles in a compact package:

**Fail toward a useful state.** Internet and fetch failures produce visible, conservative status rather than silently retaining stale health.

**Keep configuration close to the hardware.** The Wi-Fi credentials, LED geometry, ISP name, probes, and monitored services are all explicit project settings.

**Make behavior observable.** The serial monitor reports the internet check and each service result, so a visual state can be traced back to a cause.

**Limit the scope.** The project polls status APIs every minute and deliberately keeps the service list modest. It is a status indicator, not a full monitoring platform.

The complete source, pinout guide, configuration examples, and setup instructions are available in the [Did My Day Get Worse repository](https://github.com/dauble/did-my-day-get-worse).
