"use client";

import { Card, Form } from "react-bootstrap";

const BasicForm = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Basic Form</h4>

          <Form>
            <Form.Group className="mb-4">
              <label className="label text-secondary">First Name</label>
              <Form.Group>
                <Form.Control
                  type="text"
                  className="text-dark h-55"
                  placeholder="Enter Name"
                />
              </Form.Group>
            </Form.Group>

            <Form.Group className="mb-4">
              <label className="label text-secondary">Email</label>
              <Form.Group>
                <Form.Control
                  type="email"
                  className="text-dark h-55"
                  placeholder="envytheme@info.com"
                />
              </Form.Group>
            </Form.Group>

            <Form.Group className="mb-4">
              <label className="label text-secondary">Password</label>
              <Form.Group>
                <div className="password-wrapper position-relative">
                  <Form.Control
                    type="password"
                    id="password"
                    className="h-55 text-dark" 
                    placeholder="Password"
                  />
                </div>
              </Form.Group>
            </Form.Group>

            <Form.Group className="mb-4">
              <div className="form-check">
                <input
                  className="form-check-input"
                  type="checkbox"
                  value=""
                  id="flexCheckDefault"
                />
                <label className="form-check-label" htmlFor="flexCheckDefault">
                  Remember me
                </label>
              </div>
            </Form.Group>

            <div className="d-flex gap-2">
              <button
                type="submit"
                className="btn btn-primary bg-primary bg-opacity-10 text-primary border-0 fw-semibold py-2 px-4"
              >
                Submit
              </button>
              <button
                type="submit"
                className="btn btn-danger bg-danger bg-opacity-10 text-danger border-0 fw-semibold py-2 px-4"
              >
                Cancel
              </button>
            </div>
          </Form>
        </Card.Body>
      </Card>
    </>
  );
};

export default BasicForm;
