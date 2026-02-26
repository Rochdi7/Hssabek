"use client";

import { Row, Col, Breadcrumb } from "react-bootstrap";
import AnimationX from "@/components/ExtraPages/Animation/AnimationX";
import AnimationXRight from "@/components/ExtraPages/Animation/AnimationXRight";
import AnimationY from "@/components/ExtraPages/Animation/AnimationY";
import AnimationYBottom from "@/components/ExtraPages/Animation/AnimationYBottom";
import AnimationZoomeIn from "@/components/ExtraPages/Animation/AnimationZoomeIn";

export default function Page() {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">Animation</h3>

        <Breadcrumb className="breadcrumb-page-list align-items-center mb-0 lh-1">
          <Breadcrumb.Item href="/dashboard/ecommerce/">
            <div className="d-flex align-items-center text-decoration-none">
              <i className="ri-home-4-line fs-18 text-primary me-1"></i>
              <span className="text-secondary fw-medium hover">Dashboard</span>
            </div>
          </Breadcrumb.Item>

          <Breadcrumb.Item>
            <span className="fw-medium">Extra Pages</span>
          </Breadcrumb.Item>

          <Breadcrumb.Item active>
            <span className="fw-medium">Animation</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>

      <Row>
        <Col lg={6}>
          <AnimationX />

          <AnimationY />

          <AnimationZoomeIn />
        </Col>

        <Col lg={6}>
          <AnimationXRight />

          <AnimationYBottom />
        </Col>
      </Row> 
    </>
  );
}
