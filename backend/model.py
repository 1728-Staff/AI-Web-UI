import random

def generate_response(prompt):
    responses = [
        "Interesting question!",
        "I'm still learning, but I'll try my best!",
        "Here's what I found: ...",
        "Let me analyze that for you..."
    ]
    return {"response": random.choice(responses)}
