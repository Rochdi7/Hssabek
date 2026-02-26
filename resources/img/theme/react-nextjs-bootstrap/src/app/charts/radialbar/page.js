"use client";
   
import { Row, Col, Breadcrumb } from "react-bootstrap";
import BasicRadialBarChart from '@/components/Charts/RadialBarCharts/BasicRadialBarChart';
import MultipleRadialBarChart from '@/components/Charts/RadialBarCharts/MultipleRadialBarChart';
import CustomAngleCircleRadialBarChart from '@/components/Charts/RadialBarCharts/CustomAngleCircleRadialBarChart';
import GradientRadialBarChart from '@/components/Charts/RadialBarCharts/GradientRadialBarChart';
import StrockedCircularGaugeRadialBarChart from '@/components/Charts/RadialBarCharts/StrockedCircularGaugeRadialBarChart';
import SemiCircularGaugeRadialBarChart from '@/components/Charts/RadialBarCharts/SemiCircularGaugeRadialBarChart';

export default function Page() {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">RadialBar Charts</h3>
 
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
            <span className="fw-medium">RadialBar Charts</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>
 
      <Row>
        <Col md={6} lg={6} xl={4}>
          <BasicRadialBarChart />
        </Col>

        <Col md={6} lg={6} xl={4}>
          <MultipleRadialBarChart />
        </Col> 

        <Col md={6} lg={6} xl={4}>
          <CustomAngleCircleRadialBarChart />
        </Col> 

        <Col md={6} lg={6} xl={4}>
          <GradientRadialBarChart />
        </Col>

        <Col md={6} lg={6} xl={4}>
          <StrockedCircularGaugeRadialBarChart />
        </Col> 

        <Col md={6} lg={6} xl={4}>
          <SemiCircularGaugeRadialBarChart />
        </Col> 
      </Row> 
    </>
  );
}
