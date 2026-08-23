# Modern Business React

A production-oriented React + TypeScript starter based on Start Bootstrap's Modern Business design language.

## Stack

- React 19.2
- TypeScript 7
- Vite 8
- Bootstrap 5.3
- React Router
- Redux Toolkit + React Redux
- Axios
- Formik + Yup

The original Start Bootstrap Modern Business template is MIT licensed. This project reimplements its visual structure as reusable React components rather than copying the static HTML pages verbatim.

## Run

```bash
npm install
npm run dev
```

## Build

```bash
npm run typecheck
npm run lint
npm run build
npm run preview
```

## Contact API

The contact form uses Axios and a dummy POST endpoint by default:
`https://jsonplaceholder.typicode.com/posts`

Copy `.env.example` to `.env` and replace `VITE_API_BASE_URL` / `VITE_CONTACT_API_PATH` when your backend is ready.


## Requirements

Node.js 20.19+ (or a newer supported Node release) is recommended for Vite 8.

## Dependency note

This project intentionally pins a compatible TypeScript 6 + typescript-eslint 8 toolchain. Do not use `--force` or `--legacy-peer-deps`.
