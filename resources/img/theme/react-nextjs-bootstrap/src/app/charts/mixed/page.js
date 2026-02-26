"use client";
   
import { Row, Col, Breadcrumb } from "react-bootstrap";
import LineColumnChart from '@/components/Charts/MixedCharts/LineColumnChart';
import MultipleYAxisChart from '@/components/Charts/MixedCharts/MultipleYAxisChart';
import LineAreaChart from '@/components/Charts/MixedCharts/LineAreaChart';
import LineColumnAreaChart from '@/components/Charts/MixedCharts/LineColumnAreaChart';

export default function Page() {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">Mixed Charts</h3>
 
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
            <span className="fw-medium">Mixed Charts</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>
 
      <Row>
        <Col lg={6}>
          <LineColumnChart />

          <LineAreaChart />
        </Col>

        <Col lg={6}>
          <MultipleYAxisChart />

          <LineColumnAreaChart />
        </Col> 
      </Row> 
    </>
  );
}
