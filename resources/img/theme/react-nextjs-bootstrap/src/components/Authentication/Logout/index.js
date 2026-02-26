"use client";

import { Row, Col } from "react-bootstrap";
import Link from "next/link";
import Image from "next/image";

const Logout = () => {
  return (
    <>
      <div className="auth-main-content m-auto m-1230 px-3">
        <Row className="align-items-center">
          <Col lg={6} className="d-none d-lg-block">
            <Image
              src="/images/login.jpg"
              className="rounded-3"
              alt="login"
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

              <h3 className="fs-28 mb-2">Welcome back to Trezo!</h3>
              <p className="fw-medium fs-16 mb-4">You Are Logged out</p>

              <div className="d-flex align-items-center gap-2 mb-3">
                <div>
                  <Image
                    src="/images/user-69.jpg"
                    alt="user"
                    width={50}
                    height={50}
                    style={{
                      borderRadius: "100px",
                    }}
                  />
                </div>
                <h5 className="m-0 fs-16">Olivia John</h5>
              </div>

              <Link
                href="/authentication/sign-in/"
                className="btn btn-primary fw-medium py-2 px-3 w-100"
              >
                <div className="d-flex align-items-center justify-content-center py-1">
                  <span className="material-symbols-outlined fs-20 text-white me-2">
                    autorenew
                  </span>
                  <span>Sign In</span>
                </div>
              </Link>
            </div>
          </Col>
        </Row>
      </div>
    </>
  );
};

export default Logout;
