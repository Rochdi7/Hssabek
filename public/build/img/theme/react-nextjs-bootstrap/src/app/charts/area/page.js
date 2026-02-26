"use client";
   
import { Row, Col, Breadcrumb } from "react-bootstrap";
import BasicAreaChart from '@/components/Charts/AreaChart/BasicAreaChart';
import SplineAreaChart from '@/components/Charts/AreaChart/SplineAreaChart';
import StackedAreaChart from '@/components/Charts/AreaChart/StackedAreaChart';
import NegativeValuesAreaChart from '@/components/Charts/AreaChart/NegativeValuesAreaChart';
import MissingNullValuesAreaChart from '@/components/Charts/AreaChart/MissingNullValuesAreaChart';

export default function Page() {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">Area Charts</h3>
 
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
            <span className="fw-medium">Area Charts</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>
 
      <Row>
        <Col lg={6}>
          <BasicAreaChart />

          <StackedAreaChart />

          <MissingNullValuesAreaChart />
        </Col>

        <Col lg={6}>
          <SplineAreaChart />

          <NegativeValuesAreaChart />
        </Col> 
      </Row> 
    </>
  );
}
