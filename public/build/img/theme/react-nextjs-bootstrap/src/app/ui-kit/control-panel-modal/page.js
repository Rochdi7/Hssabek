"use client";
   
import { Row, Col, Breadcrumb } from "react-bootstrap";
import UncontrolledSlides from "@/components/UIKit/Carousel/UncontrolledSlides";
import ControlledCarousel from "@/components/UIKit/Carousel/ControlledCarousel";

export default function Page() {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">Carousel</h3>
 
        <Breadcrumb className="breadcrumb-page-list align-items-center mb-0 lh-1">
          <Breadcrumb.Item href="/dashboard/ecommerce/">
            <div className="d-flex align-items-center text-decoration-none">
              <i className="ri-home-4-line fs-18 text-primary me-1"></i>
              <span className="text-secondary fw-medium hover">Dashboard</span>
            </div>
          </Breadcrumb.Item>

          <Breadcrumb.Item>
            <span className="fw-medium">UI Elements</span>
          </Breadcrumb.Item>

          <Breadcrumb.Item active>
            <span className="fw-medium">Carousel</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>

      <Row>
        <Col xxl={6}>
          <UncontrolledSlides />
        </Col>

        <Col xxl={6}>
          <ControlledCarousel />
        </Col>
      </Row>
    </>
  );
}
