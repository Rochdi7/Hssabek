"use client";
   
import { Row, Col, Breadcrumb } from "react-bootstrap";
import BasicLineChart from '@/components/Charts/LineChart/BasicLineChart';
import DashedLineChart from '@/components/Charts/LineChart/DashedLineChart';
import GradientLineChart from '@/components/Charts/LineChart/GradientLineChart';
import SteplineLineChart from '@/components/Charts/LineChart/SteplineLineChart';

export default function Page() {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">Line Charts</h3>
 
        <Breadcrumb className="breadcrumb-page-list align-items-center mb-0 lh-1">
          <Breadcrumb.Item href="/dashboard/ecommerce/">
            <div className="d-flex align-items-center text-decoration-none">
              <i className="ri-home-4-line fs-18 text-primary me-1"></i>
              <span className="text-secondary fw-medium hover">Dashboard</span>
            </div>
          </Breadcrumb.Item>

          <Breadcrumb.Item>
            <span className="fw-medium">Charts</span>
          </Breadcrumb.Item>

          <Breadcrumb.Item active>
            <span className="fw-medium">Line Charts</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>
 
      <Row>
        <Col lg={6}>
          <BasicLineChart />

          <GradientLineChart />
        </Col>

        <Col lg={6}>
          <DashedLineChart />

          <SteplineLineChart />
        </Col> 
      </Row> 
    </>
  );
}
