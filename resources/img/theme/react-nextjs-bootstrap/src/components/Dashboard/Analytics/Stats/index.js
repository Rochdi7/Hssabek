"use client";

import { Row, Col, Card } from "react-bootstrap";
import Image from "next/image";
import WebsiteVisits from "./WebsiteVisits";
import NewRegisters from "./NewRegisters";

const Stats = () => {
  return (
    <>
      <Card className="border-0 p-4 bg-white rounded-3 mb-4 position-relative">
        <Row>
          <Col sm={6} md={4} className="pe-4">
            <div className="d-flex align-items-center justify-content-between position-relative">
              <div className="mb-3">
                <span className="fs-14">Website Visits</span>
                <h3 className="fs-20 mb-0">215.2k</h3>
              </div>

              <WebsiteVisits />
            </div>

            <div className="d-flex align-items-center justify-content-between position-relative mt-1">
              <span className="d-inline-block bg-success bg-opacity-10 text-success px-2 border border-success rounded-pill fs-12 fw-medium">
                +10% Increase
              </span>
              <span className="fs-12">Last 7 days</span>
            </div>
          </Col>

          <Col sm={6} md={4} className="border-start ps-lg-4">
            <div className="d-flex align-items-center justify-content-between position-relative">
              <div className="mb-3">
                <span className="fs-14">New Registers</span>
                <h3 className="fs-20 mb-0">35.3k</h3>
              </div>

              <NewRegisters />
            </div>

            <div className="d-flex align-items-center justify-content-between position-relative mt-1">
              <span className="d-inline-block bg-success bg-opacity-10 text-success px-2 border border-success rounded-pill fs-12 fw-medium">
                +15% Increase
              </span>
              <span className="fs-12">Last 7 days</span>
            </div>
          </Col>

          <Col lg={3} className="d-none d-md-block">
            <Image
              src="/images/shape-2.png"
              className="position-absolute top-0 end-0 bottom-0 shape-2"
              alt="shape"
              width={170}
              height={130}
            />
          </Col>
        </Row>
      </Card>
    </>
  );
};

export default Stats;
