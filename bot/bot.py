from flask import Flask, request, jsonify

app = Flask(__name__)

# Define simple word explanations
WORD_DEFINITIONS = {
    "Java": "A high-level programming language used for building applications.",
    "Inheritance": "A concept in OOP where a class derives properties and behavior from another class.",
    "Polymorphism": "An OOP concept where methods can take many forms depending on the context.",
    "Encapsulation": "Bundling of data and methods in a single unit in OOP.",
    "Abstraction": "Hiding complex details to simplify usage."
}

@app.route("/explain", methods=["GET"])
def explain_word():
    word = request.args.get("word")
    if word in WORD_DEFINITIONS:
        return jsonify({"word": word, "definition": WORD_DEFINITIONS[word]})
    else:
        return jsonify({"error": "Word not found"}), 404

if __name__ == "__main__":
    app.run(debug=True, port=5000)