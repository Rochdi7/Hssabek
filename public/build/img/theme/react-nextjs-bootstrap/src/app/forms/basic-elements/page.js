"use client";

import { Row, Col, Breadcrumb } from "react-bootstrap";
import TextualInputs from '@/components/Forms/BasicElements/TextualInputs';
import BasicForm from '@/components/Forms/BasicElements/BasicForm';
import CustomStyles from '@/components/Forms/BasicElements/CustomStyles';
import InputGroupsButtons from '@/components/Forms/BasicElements/InputGroupsButtons';

export default function Page() {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">Basic Elements</h3>
 
        <Breadcrumb className="breadcrumb-page-list align-items-center mb-0 lh-1">
          <Breadcrumb.Item href="/dashboard/ecommerce/">
            <div className="d-flex align-items-center text-decoration-none">
              <i className="ri-home-4-line fs-18 text-primary me-1"></i>
              <span className="text-secondary fw-medium hover">Dashboard</span>
            </div>
          </Breadcrumb.Item>

          <Breadcrumb.Item>
            <span className="fw-medium">Forms</span>
          </Breadcrumb.Item>

          <Breadcrumb.Item active>
            <span className="fw-medium">Basic Elements</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>

      <TextualInputs />

      <Row>
        <Col lg={6}>
          <BasicForm />
        </Col>

        <Col lg={6}>
          <CustomStyles />
        </Col>
      </Row>

      <InputGroupsButtons />
    </>
  );
}
