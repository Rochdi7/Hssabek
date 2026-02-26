"use client";

import { Row, Col, Form } from "react-bootstrap";
import Link from "next/link";
import Image from "next/image";

const ForgotPasswordForm = () => {
  return (
    <>
      <div className="auth-main-content m-auto m-1230 px-3">
        <Row className="align-items-center">
          <Col lg={6} className="d-none d-lg-block">
            <Image
              src="/images/forgot.jpg"
              className="rounded-3"
              alt="forgot"
              width={646}
              height={804}
            />
          </Col>

          <Col lg={6}>
            <div className="mw-480 ms-lg-auto">
              <div className="d-inline-block mb-4">
                <Image
                  src="/images/logo.svg"
                  className="rounded-3 for-light-logo"
                  alt="login"
                  width={100}
                  height={26}
                />
                <Image
                  src="/images/white-logo.svg"
                  className="rounded-3 for-dark-logo"
                  alt="login"
                  width={100}
                  height={26}
                />
              </div>

              <h3 className="fs-28 mb-2">Forgot your password?</h3>
              <p className="fw-medium fs-16 mb-4">
                Enter the email address you used when you joined and we’ll send
                you instructions to reset your password.
              </p>

              <Form>
                <Form.Group className="mb-4">
                  <label className="label text-secondary">Email Address</label>
                  <Form.Control
                    type="email"
                    className="h-55"
                    placeholder="example@trezo.com"
                  />
                </Form.Group>

                <Form.Group className="mb-4">
                  <button
                    type="submit"
                    className="btn btn-primary fw-medium py-2 px-3 w-100"
                  >
                    <div className="d-flex align-items-center justify-content-center py-1">
                      <span className="material-symbols-outlined fs-20 text-white me-2">
                        autorenew
                      </span>
                      <span>Send</span>
                    </div>
                  </button>
                </Form.Group>

                <Form.Group>
                  <p>
                    Back to{" "}
                    <Link
                      href="/authentication/sign-in/"
                      className="fw-medium text-primary text-decoration-none"
                    >
                      Sign In
                    </Link>
                  </p>
                </Form.Group>
              </Form>
            </div>
          </Col>
        </Row>
      </div>
    </>
  );
};

export default ForgotPasswordForm;
