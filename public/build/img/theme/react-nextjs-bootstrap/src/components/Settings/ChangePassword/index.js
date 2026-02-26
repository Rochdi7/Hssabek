"use client";

import { Row, Col, Form } from "react-bootstrap";
import Link from "next/link"; 

const ChangePassword = () => {
  return (
    <>
      <Form>
        <Row>
          <Col lg={6}>
            <Form.Group className="mb-4">
              <label className="label text-secondary">Old Password</label>
              <Form.Group>
                <div className="password-wrapper position-relative">
                  <Form.Control
                    type="password"
                    id="password"
                    className="h-55 text-dark"
                    defaultValue="@password#"
                  />
                </div>
              </Form.Group>
            </Form.Group>
          </Col>

          <Col lg={6}>
            <Form.Group className="mb-4">
              <label className="label text-secondary">New Password</label>
              <Form.Group>
                <div className="password-wrapper position-relative">
                  <Form.Control
                    type="password"
                    id="password"
                    className="h-55 text-dark"
                    defaultValue="@password#"
                  />
                </div>
              </Form.Group>
            </Form.Group>
          </Col>

          <Col lg={12}>
            <Form.Group className="mb-4">
              <label className="label text-secondary">Confirm Password</label>
              <Form.Group>
                <div className="password-wrapper position-relative">
                  <Form.Control
                    type="password"
                    id="password"
                    className="h-55 text-dark"
                    defaultValue="@password#"
                  />
                </div>
              </Form.Group>
            </Form.Group>
          </Col>

          <Col lg={12}>
            <Form.Group className="form-group d-flex gap-3 align-items-center">
              <button
                type="submit"
                className="btn btn-primary py-2 px-4 fw-medium fs-16"
              >
                {" "}
                <i className="ri-check-line text-white fw-medium"></i> Change
                Password
              </button>
              <Link href="#" className="text-danger fs-16 text-decoration-none">
                Forgot Password?
              </Link>
            </Form.Group>
          </Col>
        </Row>
      </Form>
    </>
  );
};

export default ChangePassword;
