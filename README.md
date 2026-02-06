# AI and LLM Library for PHP

This library provides a single, unified, framework-independent library for integration with many popular AI platforms and large language models.

## Supported platforms

- Gemini
- Mock
- OpenAI

### Platform feature support

**Note** Each platform refers to generating content differently. I've decided the word "query" is the most succinct term to describe the process by which a large language model generates content. The "Queries" section below refers to the ability to compile and execute a query against a large language model.

| Feature       | Gemini | Mock | OpenAI |
| ------------- | :----: | :--: | :----: |
| **Batches**   |        |      |        |
| Create        |   ❌   |  ❌  |   ❌   |
| Read          |   ❌   |  ❌  |   ❌   |
| Cancel        |   ❌   |  ❌  |   ❌   |
| **Files**     |        |      |        |
| Upload        |   ✅   |  ✅  |   ✅   |
| Read          |   ❌   |  ❌  |   ❌   |
| List          |   ❌   |  ❌  |   ❌   |
| Download      |   ❌   |  ❌  |   ❌   |
| Delete        |   ❌   |  ✅  |   ✅   |
| **Queries** |        |      |        |
| Compile       |   ✅   |  ✅  |   ✅   |
| Execute       |   ✅   |  ✅  |   ✅   |

## Credits

- [Vic Cherubini](https://github.com/viccherubini), [1:N Labs, LLC](https://1tomany.com)

## License

The MIT License
