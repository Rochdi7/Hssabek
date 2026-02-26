"use client";

import { Row, Col } from "react-bootstrap";
import Link from "next/link";

const Welcome = () => {
  return (
    <>
      <Row>
        <Col md={7}>
          <div className="mb-4">
            <h3 className="fs-20 fw-semibold mb-1">
              Welcome Back, <span className="text-primary">Olivia!</span>
            </h3>
            <p style={{ lineHeight: 1.4 }}>
              Monitor and manage employee performance, attendance and more in
              one place.
            </p>
          </div>
        </Col>

        <Col md={5}>
          <div className="d-flex flex-wrap gap-2 justify-content-md-end mb-4">
            <Link
              href="/extra-pages/pricing-plan/"
              className="btn d-flex align-items-center gap-1"
              style={{
                backgroundColor: "#F3E8FF",
                color: "#7C24CC",
                padding: "3.5px 11px",
              }}
            >
              <i
                className="ri-vip-crown-line fs-18 lh-1"
                style={{ color: "#7C24CC" }}
              ></i>
              Plan Upgrade
            </Link>

            <button
              className="btn d-flex align-items-center gap-1"
              style={{
                backgroundColor: "#FFE8D4",
                color: "#C52B09",
                padding: "3.5px 11px",
              }}
            >
              <i
                className="ri-file-download-line fs-18 lh-1 position-relative top-1"
                style={{ color: '#C52B09' }}
              ></i>
              Export Reports
            </button>
          </div>
        </Col>
      </Row>
    </>
  );
};

export default Welcome;
