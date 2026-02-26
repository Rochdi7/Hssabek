"use client";

import { Form, Button } from "react-bootstrap";

const SearchForm = () => {
  return (
    <>
      <Form className="src-form position-relative">
        <Form.Control
          type="text" 
          placeholder="Search here....."
        />
        <Button
          variant="primary"
          type="submit"
          className="src-btn position-absolute top-50 end-0 translate-middle-y bg-transparent p-0 border-0"
        > 
          <i className="material-symbols-outlined">search</i>
        </Button>
      </Form>
    </>
  )
}

export default SearchForm;