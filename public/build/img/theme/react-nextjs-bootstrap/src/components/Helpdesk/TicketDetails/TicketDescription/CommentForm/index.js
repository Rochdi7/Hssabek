"use client";

import { Form } from "react-bootstrap";

const CommentForm = () => {
  return (
    <>
      <Form>
        <Form.Group className="mb-4">
          <Form.Label className="label text-secondary fs-14">
            Post A Reply
          </Form.Label>

          <Form.Control as="textarea" rows={6} placeholder="Type here..." /> 
        </Form.Group>

        <Form.Group className="d-flex flex-wrap gap-3">
          <button
            type="submit"
            className="btn btn-danger fw-medium fs-16 py-2 px-4"
          >
            <span className="py-1 d-inline-block text-white">
              Save As Draft
            </span>
          </button>

          <button
            type="submit"
            className="btn btn-primary fw-medium fs-16 py-2 px-4"
          >
            <div className="d-flex align-items-center">
              <span className="material-symbols-outlined fs-20 me-2 text-white">
                  send
                </span>
              
              <span className="py-1 d-inline-block text-white">Submit Now</span>
            </div>
          </button>
        </Form.Group>
      </Form>
    </>
  );
};

export default CommentForm;
