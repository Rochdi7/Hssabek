"use client";
   
import { Row, Col, Breadcrumb } from "react-bootstrap"; 
import BasicProgressBars from "@/components/UIKit/ProgressBars/BasicProgressBars";
import ProgressWithLabel from "@/components/UIKit/ProgressBars/ProgressWithLabel";
import ProgressScreenreaderLabel from "@/components/UIKit/ProgressBars/ProgressScreenreaderLabel";
import Contextual from "@/components/UIKit/ProgressBars/Contextual";
import Striped from "@/components/UIKit/ProgressBars/Striped";
import Animated from "@/components/UIKit/ProgressBars/Animated";
import Stacked from "@/components/UIKit/ProgressBars/Stacked";

export default function Page() {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">Progress Bars</h3>
 
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
            <span className="fw-medium">Progress Bars</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>

      <Row>
        <Col lg={6}>
          <BasicProgressBars />

          <ProgressScreenreaderLabel />

          <Striped />

          <Stacked />
        </Col>

        <Col lg={6}>
          <ProgressWithLabel />

          <Contextual />

          <Animated />
        </Col>
      </Row>
    </>
  );
}
