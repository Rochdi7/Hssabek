"use client";
 
import { Row, Col, Breadcrumb } from "react-bootstrap";
import CourseDetails from '@/components/Lms/CourseDetails';
import TablesOfContent from '@/components/Lms/CourseDetails/TablesOfContent';
import CourseInstructor from '@/components/Lms/CourseDetails/CourseInstructor';
import EnrolledStudents from '@/components/Lms/CourseDetails/EnrolledStudents';
import Reviews from '@/components/Lms/CourseDetails/Reviews';

export default function Page() {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">Course Details</h3>
 
        <Breadcrumb className="breadcrumb-page-list align-items-center mb-0 lh-1">
          <Breadcrumb.Item href="/dashboard/ecommerce/">
            <div className="d-flex align-items-center text-decoration-none">
              <i className="ri-home-4-line fs-18 text-primary me-1"></i>
              <span className="text-secondary fw-medium hover">Dashboard</span>
            </div>
          </Breadcrumb.Item>

          <Breadcrumb.Item>
            <span className="fw-medium">LMS</span>
          </Breadcrumb.Item>

          <Breadcrumb.Item>
            <span className="fw-medium">Courses</span>
          </Breadcrumb.Item>

          <Breadcrumb.Item active>
            <span className="fw-medium">Course Details</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>

      <CourseDetails />

      <TablesOfContent />

      <Row>
        <Col lg={7}>
          <CourseInstructor />
        </Col>

        <Col lg={5}>
          <EnrolledStudents />
        </Col>
      </Row>

      <Reviews />
    </>
  );
}
