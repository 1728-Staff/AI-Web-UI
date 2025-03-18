from flask import Flask, request, jsonify
from model import generate_response

app = Flask(__name__)

@app.route("/chat", methods=["GET"])
def chat():
    user_message = request.args.get("message", "")
    response = generate_response(user_message)
    return jsonify(response)

if __name__ == "__main__":
    app.run(host="0.0.0.0", port=5000)
