"use client";
   
import { Row, Col, Breadcrumb } from "react-bootstrap";
import DefaultButtons from "@/components/UIKit/Buttons/DefaultButtons";
import OutlineButtons from "@/components/UIKit/Buttons/OutlineButtons";
import SoftButtons from "@/components/UIKit/Buttons/SoftButtons";
import ButtonsWithIcon from "@/components/UIKit/Buttons/ButtonsWithIcon";
import RoundedButtons from "@/components/UIKit/Buttons/RoundedButtons";
import OutlineRoundedButtons from "@/components/UIKit/Buttons/OutlineRoundedButtons";
import BlockButtons from "@/components/UIKit/Buttons/BlockButtons";

export default function Page() {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">Buttons</h3>
 
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
            <span className="fw-medium">Buttons</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>

      <Row>
        <Col lg={6}>
          <DefaultButtons />

          <SoftButtons />

          <RoundedButtons />
        </Col>

        <Col lg={6}>
          <OutlineButtons />

          <ButtonsWithIcon />

          <OutlineRoundedButtons />
        </Col>
      </Row>

      <Row className="justify-content-center">
        <Col lg={6}>
          <BlockButtons />
        </Col>
      </Row> 
    </>
  );
}
