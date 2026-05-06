# Architecture Overview

## Design Approach

The system is designed using a modular architecture.

Instead of using if-else conditions, each question type is handled separately.

---

## Question Types

Each question type has its own class:

- BinaryQuestion
- SingleChoiceQuestion
- MultipleChoiceQuestion
- TextQuestion
- NumberQuestion

All follow a common structure.

---

## Resolver

A resolver is used to select the correct logic based on question type.

This avoids hardcoding and improves scalability.

---

## Database Design

Tables used:

- quizzes
- questions
- options
- attempts
- answers

Answers are stored in a flexible format to support all question types.

---

## Evaluation Flow

1. User submits quiz  
2. Controller processes answers  
3. Resolver selects correct class  
4. Score is calculated  

---

## Extensibility

To add a new question type:

1. Create new class  
2. Add logic  
3. Register in resolver  

No existing code needs modification.

---

## Why this design?

- Clean and modular  
- Easy to extend  
- Avoids duplication  
- Industry-relevant approach