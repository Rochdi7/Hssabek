"use client";

import { Card, Form } from "react-bootstrap";

const InputGroupsButtons = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Input Groups Buttons</h4>

          <Form className="src-form">
            <Form.Group className="mb-4 position-relative">
              <Form.Control
                type="text"
                className="h-55 bg-body-bg border-0 text-dark rounded-pill"
                placeholder="Search here.."
              />
              <button
                type="submit"
                className="position-absolute top-50 end-0 translate-middle-y bg-transparent p-0 pe-3 border-0"
              >
                <i className="ri-search-line fs-24 position-relative top-1 text-primary"></i>
              </button>
            </Form.Group>

            <Form.Group className="mb-4 position-relative">
              <Form.Control
                type="text"
                className="h-55 bg-body-bg border-0 text-dark rounded-pill"
                placeholder="Search here.."
              />
              <button
                type="submit"
                className="position-absolute top-50 end-0 translate-middle-y bg-primary p-0 wh-40 border-0 text-center text-white rounded-circle me-2"
              >
                <i className="ri-search-line fs-24 position-relative top-1"></i>
              </button>
            </Form.Group>

            <Form.Group className="mb-4 position-relative">
              <Form.Control
                type="text"
                className="h-55 bg-body-bg border-0 text-dark rounded-pill"
                placeholder="Search here.."
              />
              <button
                type="submit"
                className="position-absolute top-50 end-0 translate-middle-y bg-primary p-0 border-0 text-center text-white rounded-pill px-3 py-2 me-2 fw-semibold"
              >
                Search
              </button>
            </Form.Group>
          </Form>
        </Card.Body>
      </Card>
    </>
  );
};

export default InputGroupsButtons;
