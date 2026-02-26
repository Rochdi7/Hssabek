"use client";

import { Form } from "react-bootstrap";

const SearchForm = () => {
  return (
    <>
      <Form className="position-relative table-src-form">
        <Form.Control type="text" placeholder="Search here" />

        <span className="material-symbols-outlined position-absolute top-50 start-0 translate-middle-y">
          search
        </span>
      </Form>
    </>
  );
};

export default SearchForm;
