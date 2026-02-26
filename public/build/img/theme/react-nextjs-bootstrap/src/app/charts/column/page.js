"use client";
   
import { Row, Col, Breadcrumb } from "react-bootstrap";
import BasicColumnChart from '@/components/Charts/ColumnCharts/BasicColumnChart';
import DataLabelsColumnChart from '@/components/Charts/ColumnCharts/DataLabelsColumnChart';
import StackedColumnChart from '@/components/Charts/ColumnCharts/StackedColumnChart';
import RangeColumnChart from '@/components/Charts/ColumnCharts/RangeColumnChart';
import RotatedLabelsColumnChart from '@/components/Charts/ColumnCharts/RotatedLabelsColumnChart';
import DistributedColumnChart from '@/components/Charts/ColumnCharts/DistributedColumnChart';

export default function Page() {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">Column Charts</h3>
 
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
            <span className="fw-medium">Column Charts</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>
 
      <Row>
        <Col lg={6}>
          <BasicColumnChart />

          <StackedColumnChart />

          <RotatedLabelsColumnChart />
        </Col>

        <Col lg={6}>
          <DataLabelsColumnChart />

          <RangeColumnChart />

          <DistributedColumnChart />
        </Col> 
      </Row> 
    </>
  );
}
